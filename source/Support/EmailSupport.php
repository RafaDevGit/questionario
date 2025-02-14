<?php

namespace Source\Support;

use Source\Models\Dado;
use Source\Models\Pergunta;
use Dompdf\Dompdf;

/**
 * Suporte para classe Email
 */
class EmailSupport
{
   /**
    * Envia email para gabriela, informando que o usuário acabou o questionário
    *
    * @param Dado $obPesquisador
    * @return void
    */
   public static function enviaEmailParaCliente(Dado $obPesquisador): void
   {
      $mensagem = "O pesquisador <b>$obPesquisador->nome</b> acabou de responder o questionário!";
      $email = new Email('Questionário', $_ENV['EMAILFROM'], $_ENV['EMAILNOME'], 'Uma pessoa terminou de responder o questionário', $mensagem);
      $email->sendEmail();
   }

   /**
    * Envia email para pesquisador, informando as respostas
    *
    * @param Dado $obPesquisador
    * @param array $obRespostas
    * @return void
    */
   public static function enviaEmailParaPesquisador(Dado $obPesquisador, array $obRespostas, $view): void
   {
      $questoes = (new Respostas($obRespostas))->simplificarDadosRespostas();
      $questoesForPdf = self::getQuestoesWithPerguntas($questoes);

      $htmlForPdf = $view->render('modelos/emailModelo', ['perguntas' => $questoesForPdf]);

      // Salva o arquivo pdf
      self::savePdfWithHtml($htmlForPdf, $obPesquisador->id);

      // Envia email nesse momento
      $email = new Email(
         $_ENV['EMAILNOME'],
         $obPesquisador->email,
         $obPesquisador->nome,
         'Questionário',
         "Prezado (a) pesquisador (a),<br>
         Muito obrigada por ter participado do nosso estudo!<br>
         Suas respostas do questionário encontram-se anexas.",
         [
            dirname(__DIR__, 2) . "/themes/assets/questoes/questionario-$obPesquisador->id.pdf",
            dirname(__DIR__, 2) . "/themes/modelos/forPdf/consentimento.pdf",
            dirname(__DIR__, 2) . "/themes/modelos/forPdf/imagem-som.pdf"
         ]
      );

      $email->sendEmail();
   }

   /**
    * Obtém as questões completas, ou seja com o texto da pergunta
    *
    * @param array $questoes
    * @return array
    */
   private static function getQuestoesWithPerguntas(array $questoes): array
   {
      $questoesForPdf = [];

      foreach ($questoes as $pergunta => $resposta) {
         $perguntaSplitada = explode("_", $pergunta);

         if ($perguntaSplitada[count($perguntaSplitada) - 1] == "Outro")
            $pergunta = str_replace('_Outro', "", $pergunta);

         $textoPergunta = (new Pergunta)->find('id = :id', "id=$pergunta")->fetch();

         if ($textoPergunta) {
            $textoPergunta = $textoPergunta->pergunta;
            $textoPergunta = explode(" ", $textoPergunta);
            $textoPergunta[0] = $textoPergunta[0] . " - ";
            $textoPergunta = implode(" ", $textoPergunta);
         } else {
            $textoPergunta = $pergunta . " - ";
         }

         $textoResposta = $resposta['resposta'];
         $questoesForPdf[] = $textoPergunta . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>R:" . $textoResposta . "</b>";
      }

      return $questoesForPdf;
   }

   /**
    * Salva o PDF com o html em um arquivo com id do pesquisador
    *
    * @param string $html
    * @param integer $id
    * @return void
    */
   private static function savePdfWithHtml(string $html, int $id): void
   {
      // instantiate and use the dompdf class
      $dompdf = new Dompdf();
      $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
      $dompdf->loadHtml($html);
      // Render the HTML as PDF
      $dompdf->render();

      //$dompdf->stream('teste.pdf', ['Attachment' => false]);

      // SALVA OS DADOS EM UM ARQUIVO
      file_put_contents(
         dirname(__DIR__, 2) . '/themes/assets/questoes/' . "questionario-$id.pdf",
         $dompdf->output()
      );
   }
}
