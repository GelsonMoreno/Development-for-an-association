<?php


namespace app\components;


use kartik\mpdf\Pdf;

class ExportPDF
{
  public static function export($content, $title, $subject,$header){
    $pdf = new Pdf([
      'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
      'content' => $content,
      'options' => [
        'title' => $title,
        'subject' => $subject
      ],
      'methods' => [
        'SetHeader' => [$header],
        'SetFooter' => ['|Page {PAGENO}|'],
      ]
    ]);
    return $pdf->render();
  }
}