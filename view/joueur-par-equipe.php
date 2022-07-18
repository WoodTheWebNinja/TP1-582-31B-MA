{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}




<div class="table_wrapper">
       <h1>{{name}}</h1>

        <table class = "fl-table">

            <tr>
            <thead>         
                <th> Nom de l'Equipe</th>
                <th>Nom de Famille </th>
           
            </thead>
 
            </tr>
         
            <tr>
          
               <td>{{players.nom }}</td>
                <td>{{players.nom_famille }}</td>
            </tr>
           
        </table>
</div>    




{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}