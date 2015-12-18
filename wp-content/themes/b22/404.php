<?php
/*
Template Name: 404
*/
?>

<?php get_header(); ?>


<div id="content">
<div id="mainCol">
<div id="paginaArchivio">


<h2>Spiacenti: la pagina che cercavi non esiste</h2>
<p>Prova a navigare tra gli archivi</p>


	<div class="left">
<h2>Archivio per mesi:</h2>
	<ul>
		<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
	</ul>
</div>

<div class="right">
<h2>Archivio per categoria:</h2>
	<ul>
		 <?php wp_list_categories('show_count=1&title_li='); ?>
	</ul>
</div>

<br class="clear" />




</div>
</div> <!-- chiudo #mainCol -->	
	
	

<?php get_sidebar(); ?>


</div> <!-- chiudo #content -->
 <br class="clear" />
</div> <!-- chiudo #page -->


<?php get_footer(); ?>