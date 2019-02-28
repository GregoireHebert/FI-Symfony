<?php

/* header.html */
class __TwigTemplate_2423db898e276eb3b58980d3e52ebbcfc433a456fd9a1f58b1c6c8ef06d7b21f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "header.html"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "header.html"));

        // line 1
        echo "<header>
  <style type=\"text/css\">
  a {
    color: #000000;
    text-decoration: none;
  } 
  a:hover {
    color: #1F1F1F;
    text-decoration: none;
  } 
  .subtitle {
    color: #7E7E7E;
  }

</style>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
  <a class=\"navbar-brand\" href=\"/\">ValTom's Articles</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>

  <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/tag\">Tags</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/blogposts\">Add article</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/tag/add\">Add tag</a>
      </li>
    </ul>
  </div>
</nav>
</header>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function getDebugInfo()
    {
        return array (  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<header>
  <style type=\"text/css\">
  a {
    color: #000000;
    text-decoration: none;
  } 
  a:hover {
    color: #1F1F1F;
    text-decoration: none;
  } 
  .subtitle {
    color: #7E7E7E;
  }

</style>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
  <a class=\"navbar-brand\" href=\"/\">ValTom's Articles</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>

  <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/tag\">Tags</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/blogposts\">Add article</a>
      </li>
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/tag/add\">Add tag</a>
      </li>
    </ul>
  </div>
</nav>
</header>", "header.html", "/home/kwet/Bureau/FI-Symfony/templates/header.html");
    }
}
