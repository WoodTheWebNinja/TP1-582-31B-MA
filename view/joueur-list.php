{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}

<h1>coach</h1>
<div class="table_wrapper">
        <table class = "fl-table">

            <tr>
            <thead>
                <th>Nom</th>
                <th>Nom de famille</th>
         
           
            </thead>
 
            </tr>
            {% for joueurs in joueurs %}
            <tr>
               
                <td><a href="joueur/edit/{{joueurs.numero_Joeur}}">{{joueurs.nom }}</a></td>
                <td><a href="joueur/edit/{{joueurs.numero_Joeur}}">{{joueurs.nom_famille }}</a></td>
            </tr>
            {% endfor %}
        </table>
</div>    
{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}