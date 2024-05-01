<?php 
    require('../vendor/autoload.php');
    
    $fileName = '../Storage/Acheter un bassin préformé.docx';
    $content = '';
    $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
    // $objReader->load($fileName);

    if($objReader->canRead($fileName)) {
        $phpWord = $objReader->load($fileName);
        $sections = $phpWord->getSections();

        foreach($sections as $s) {
            $els = $s->getElements();
            foreach($els as $el) {
                if(get_class($el) === 'PhpOffice\PhpWord\Element\TextRun') {
                    
                    foreach($el->getElements() as $e) {
                        $content .= $e->getText();
                    }
                }
                else if(get_class($el) === 'PhpOffice\PhpWord\Element\TextBreak') {
                    // $content .= " <br>";
                }
                else {
                    throw new Exception('Unknown class type '.get_class($el));
                }
                $content .= " <br>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="font-size: <?= $e->getFontStyle()->getSize(); ?>px;">
        <?php
            print $content;
        ?>
    </div>
</body>
</html>