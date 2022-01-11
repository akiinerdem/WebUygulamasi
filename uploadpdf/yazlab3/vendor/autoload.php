<?php
/*
Using PDFParser without Composer
Folder structure
================
webroot
  pdfdemos
    INV001.pdf # test PDF file to extract text from for demo
    test.php # our operational demo file
  vendor
    autoload.php
    tecnickcom
      tcpdf # unpack v6.2.12 from release at https://github.com/tecnickcom/TCPDF/archive/6.2.12.tar.gz
    smalot
      pdfparser # unpack from git master https://github.com/smalot/pdfparser/archive/master.zip release is 0.9.25 dated 2015-09-15
        docs # optional
        samples # optional
        src
          Smalot
            PdfParser
*/

$vendorDir = 'vendor';
$tcpdf_files = Array(
    'Datamatrix' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
    'PDF417' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
    'QRcode' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
    'TCPDF' => $vendorDir . '/tecnickcom/tcpdf/tcpdf.php',
    'TCPDF2DBarcode' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
    'TCPDFBarcode' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
    'TCPDF_COLORS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
    'TCPDF_FILTERS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
    'TCPDF_FONTS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
    'TCPDF_FONT_DATA' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
    'TCPDF_IMAGES' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_images.php',
    'TCPDF_IMPORT' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_import.php',
    'TCPDF_PARSER' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_parser.php',
    'TCPDF_STATIC' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_static.php'
);

foreach ($tcpdf_files as $file) {
    include_once $file;
}

include_once  $vendorDir . "/Smalot/PdfParser/Parser.php";
include_once  $vendorDir . "/Smalot/PdfParser/Document.php";
include_once  $vendorDir . "/Smalot/PdfParser/Header.php";
include_once  $vendorDir . "/Smalot/PdfParser/PDFObject.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element.php";
include_once  $vendorDir . "/Smalot/PdfParser/Encoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font.php";
include_once  $vendorDir . "/Smalot/PdfParser/Page.php";
include_once  $vendorDir . "/Smalot/PdfParser/Pages.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementArray.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementBoolean.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementString.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementDate.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementHexa.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementMissing.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementName.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementNull.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementNumeric.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementStruct.php";
include_once  $vendorDir . "/Smalot/PdfParser/Element/ElementXRef.php";

include_once  $vendorDir . "/Smalot/PdfParser/Encoding/StandardEncoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Encoding/ISOLatin1Encoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Encoding/ISOLatin9Encoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Encoding/MacRomanEncoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Encoding/WinAnsiEncoding.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font/FontCIDFontType0.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font/FontCIDFontType2.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font/FontTrueType.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font/FontType0.php";
include_once  $vendorDir . "/Smalot/PdfParser/Font/FontType1.php";
include_once  $vendorDir . "/Smalot/PdfParser/XObject/Form.php";
include_once  $vendorDir . "/Smalot/PdfParser/XObject/Image.php";

// include if present
$pdfparser_path = '$vendorDir . "/Smalot/PdfParser/';

$pdfparser_files = Array(
  "Parser.php"
, "Document.php"
, "Header.php"
, "PDFObject.php"
, "Element.php"
, "Encoding.php"
, "Font.php"
, "Page.php"
, "Pages.php"
, "Element/ElementArray.php"
, "Element/ElementBoolean.php"
, "Element/ElementString.php"
, "Element/ElementDate.php"
, "Element/ElementHexa.php"
, "Element/ElementMissing.php"
, "Element/ElementName.php"
, "Element/ElementNull.php"
, "Element/ElementNumeric.php"
, "Element/ElementStruct.php"
, "Element/ElementXRef.php"

, "Encoding/StandardEncoding.php"
, "Encoding/ISOLatin1Encoding.php"
, "Encoding/ISOLatin9Encoding.php"
, "Encoding/MacRomanEncoding.php"
, "Encoding/WinAnsiEncoding.php"
, "Font/FontCIDFontType0.php"
, "Font/FontCIDFontType2.php"
, "Font/FontTrueType.php"
, "Font/FontType0.php"
, "Font/FontType1.php"

, "RawData/FilterHelper.php"
, "RawData/RawDataParser.php"

, "XObject/Form.php"
, "XObject/Image.php"
);

foreach ($pdfparser_files as $file) {
	$p_file = $pdfparser_path.$file;
	
}



/*
// Information for comparison with composer
use Datamatrix;
use PDF417;
use QRcode;
use TCPDF;
use TCPDF2DBarcode;
use TCPDFBarcode;
use TCPDF_COLORS;
use TCPDF_FILTERS;
use TCPDF_FONTS;
use TCPDF_FONT_DATA;
use TCPDF_IMAGES;
use TCPDF_IMPORT;
use TCPDF_PARSER;
use TCPDF_STATIC;
*/