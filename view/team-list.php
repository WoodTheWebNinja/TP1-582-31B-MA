{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}

<h1>Equipe</h1>
<div class="table_wrapper">
        <table class = "fl-table">

            <tr>
            <thead>         
                <th> Nom de l'Equipe</th>
                <th>Nom de la ville </th>
           
            </thead>
 
            </tr>
            {% for equipes in equipe %}
            <tr>
                <td><a href="equipe/show/{{equipes.idEquipe}}">{{equipes.nom_Equipe }}</a></td>
                <td>{{equipes.nom }}</td>
            </tr>
            {% endfor %}
        </table>
</div>    

<div class="table_wrapper">
        <table class = "fl-table">

            <tr>
            <thead>         
                <th> Listes des ville
</th>
      
           
            </thead>
 
            </tr>
            {% for ville in ville %}
            <tr>
                <td>{{ville.nom }}</td>
              
            </tr>
            {% endfor %}
        </table>
</div>    


<div class="button_wrapper"> 
  <a href=" equipe/create/" class="buttoncta" >  Ajouter des Villes  </a> 

  </div>


{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}