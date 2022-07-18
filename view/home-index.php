{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}

<h2> Sélectionner l'action que vous voulez accomplir </h2>
<ul>
       


        <h2> {{message}} </h2>
        
    </ul>

{% endblock %}


{% block footer %}
<div class="footer_menu">
<ul>
 
  <li><a href=" index.php/equipe"> Ajouter ou supprimer une ville</a></li>
  <li><a href="index.php/coach">Cliquez sur une equipe  pour voir la liste des joueurs par equipe</a></li>
  <li><a href="index.php/joueur">Modifier ou effacer un joueur </a></li>

</ul>
</div>
<footer> 
 <h1> </h1>  
</footer>
    
{% endblock %}