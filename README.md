newsletter
==========

Système de gestion des newsletters de Sciencespo

Le système est une web-app PHP/HTML/CSS/JAVASCRIPT.


Structure d'un gabarit de newsletter :

- index.php *
- style.css *
- images/ *
- bloc1.php
- bloc2.php
- …

#index.php
Le fichier index sert de structure globale.
Voici les fonctions et variables que l'on peux récupérer dans index.php :
- l'url de l'archive :
```html
<a href="http://www.sciencespo.fr/newsletter/archive-<?php echo $news->unique_id();?>.html">Cliquer ici</a>
```
- écrire la date
```php
<?php
setlocale(LC_ALL, 'en_EN');
$timestamp_tab = explode('-',$ladate);
$timestamp = mktime(0, 0, 0, $timestamp_tab[1], $timestamp_tab[2], $timestamp_tab[0]); 
echo utf8_encode(strftime('%b %d, %Y',$timestamp));
?>
```
- adresse des images du dossier template :
```php
<?php echo $template;?>images/
```
- insérer une liste d'actualités/événements/item RSS :
```php
<?php $news->set_contenu("nom_de_la_liste","fichier_bloc.php"); ?>
```
#fichier_bloc.php
Un fichier de bloc, est l'élément qui va être répété pour chaque item actualités/événements/item. Il peut être différent pour chaque ```php $news->set_contenu ```

