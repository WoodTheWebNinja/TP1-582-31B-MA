{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}
{{joueurs.nom_famille }}
<form action="../joueur/store" method="post">
            <label> Nom
                <input type="text" name="nom" value= '{{joueurs.nom_famille }}'>
            </label>
            <label> Nom de famille
                <input type="text" name="nom_famille" value= {{joueurs.nom_famille }}>
            </label>
          
            <input type="submit">
{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}