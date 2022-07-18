{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}

<h2> Sélectionner l'action que vous voulez accomplir </h2>
<ul>
        <li><a href='Coach/list'> Liate des coachs </a></li>
        
    </ul>

{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}