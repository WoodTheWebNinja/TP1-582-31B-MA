{% extends "layout.twig" %}
{%block head %}  {{ parent() }}   {% endblock %}




{% block title %}Index{% endblock %}
{% block header %}
    {{ parent() }}
    
{% endblock %}
{% block content %}
{{ errors }}
<h2> Ajouter une ville </h1>
    <form action="../store" method="POST">
    <label for="name">Nom de la ville </label>
    <input type="text" id="nom" name="nom" maxlenght="30" value="Ajouter la ville ">
 

    <input type="submit">
    </form>
    <hr>

{% endblock %}


{% block footer %}
    {{ parent() }}
    
{% endblock %}


