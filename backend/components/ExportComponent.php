<?php

namespace backend\components;

use common\models\Ekspedisi;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ExportComponent extends Component
{
    public $captionStyle = [
        'font' => [
            'size' => 14,
            'bold' => true
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
        ]
    ];

    public $headerStyle = [
        'font' => [
            'bold' => true,
            'color' => [
                'rgb' => 'FFFFFF'
            ]
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ]
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'rgb' => '538ED5'
            ],
        ]
    ];

    public $styleArray = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ]
        ],
    ];

    public function exportFile($fileName, $action)
    {
        // PARSE DATA FROM DB
        $database = Ekspedisi::find()->all();

        // TO ARRAY
        $arrData = ArrayHelper::toArray($database);

        // SPREADSHEET OBJECT
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        // SET DEFAULT FONT STYLE
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(11);

        // FILE CAPTION
        $worksheet->setCellValue('A1', 'DATA EKSPEDISI');
        $worksheet->mergeCells('A1:E1');
        // STYLING CAPTION
        $worksheet->getStyle('A1:E1')->applyFromArray($this->captionStyle);

        // FILE HEADER
        $worksheet->setCellValue('A2', 'ID')
                ->setCellValue('B2', 'Kota')
                ->setCellValue('C2', 'Service Code')
                ->setCellValue('D2', 'Berat (kg)')
                ->setCellValue('E2', 'Harga (Rp)');
        // STYLING HEADER
        $worksheet->getStyle('A2:E2')->applyFromArray($this->headerStyle);

        // SET DATA FROM DB TO CELLS
        $row = 3;
        foreach($arrData as $data){
            $spreadsheet->getActiveSheet()
                        ->setCellValue('A'.$row, $data['id'])
                        ->setCellValue('B'.$row, $data['kota'])
                        ->setCellValue('C'.$row, $data['service_code'])
                        ->setCellValue('D'.$row, $data['berat'])
                        ->setCellValue('E'.$row, \number_format($data['harga'],2,',','.'));
            
            $spreadsheet->getActiveSheet()->getStyle('A'.$row.':E'.$row)->applyFromArray($this->styleArray);

            $row++;
        }

        // SET COLUMN WIDTH
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);

        // CHECK ACTION
        if ($action == 'XLSX'){
            // CONFIGURE HEADER
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="'.$fileName.'.xlsx"');
    
            // CREATE WRITER XLSX
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
            die();
        } 
        else if ($action == 'PDF'){
            // CONFIGURE HEADER
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.$fileName.'"');
    
            // CREATE WRITER PDF
            $writer = IOFactory::createWriter($spreadsheet, 'Dompdf');
            $writer->save('php://output');
            die();
        }
    }
}
