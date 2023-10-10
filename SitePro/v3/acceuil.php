
<h1>
    Who Am I ? 
</h1>
<p>
    Je suis Yahya, élève ingenieur en derniere année Cycle d'ingénieur à l'IMT nord Europe. Et Aujourd'hui, je viens de créer mon premier site Web contenant my hobbies et mon CV. 
</p>
<?php
require_once("template_header.php");
require_once("template_menu.php");
$currentPageId = 'accueil';
if(isset($_GET['page'])) {
$currentPageId = $_GET['page'];
}
?>
<header class="bandeau_haut">
<h1 class="titre">Hector Durand</h1>
</header>
<?php
renderMenuToHTML($currentPageId);
?>
<section class="corps">
<?php
$pageToInclude = $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);
else
require_once("error.php");
?>
</section>
<?php
require_once("footer.php");
?>