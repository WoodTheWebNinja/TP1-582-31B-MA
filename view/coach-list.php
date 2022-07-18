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
                <th>Equipe</th>
           
            </thead>
 
            </tr>
            {% for coach in coachs %}
            <tr>
                <td>{{coach.nom }}</td>
                <td>{{coach.nom_famille }}</td>
                <td><a href="../equipe/show/{{coach.idEquipe}}">{{coach.nom_Equipe }}</a></td>
            </tr>
            {% endfor %}
        </table>
</div>    
{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}