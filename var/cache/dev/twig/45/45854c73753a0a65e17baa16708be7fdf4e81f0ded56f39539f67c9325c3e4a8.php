<?php

/* article/show.html.twig */
class __TwigTemplate_4fe3cc0b16876339c6d70c1d0d8681f34a61625f61fffabc2e14b788d31e2586 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "article/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "article/show.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    </head>

    <body>

        ";
        // line 13
        $this->loadTemplate("header.html", "article/show.html.twig", 13)->display($context);
        // line 14
        echo "
         <div class=\"container\">

            <div class=\"row justify-content-md-center\">
               
                <div class=\"col-*-auto\">
                    <h1>ValTom's</h1>
                </div>
               
            </DIV>




                <div class=\"row justify-content-md-center\">
               
                    <div class=\"col-*-6 col-*-push-3\">

                        <table class=\"table\">
                            <tbody>
                                <tr>
                                    <th>Id</th>
                                    <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 36, $this->source); })()), "id", []), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 40, $this->source); })()), "title", []), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <th>Subtitle</th>
                                    <td>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 44, $this->source); })()), "subtitle", []), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <th>Corpus</th>
                                    <td>";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 48, $this->source); })()), "corpus", []), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <th>CreatedAt</th>
                                    <td>";
        // line 52
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 52, $this->source); })()), "createdAt", [])) ? (twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 52, $this->source); })()), "createdAt", []), "Y-m-d H:i:s")) : ("")), "html", null, true);
        echo "</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href=\"";
        // line 57
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("article_index");
        echo "\">back to list</a>

                    </div>

                </div>

                <div class=\"row justify-content-md-center\">
               
                    <div class=\"col-2 m-*-auto\">
                        <a href=\"/article/";
        // line 66
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 66, $this->source); })()), "id", []) - 1), "html", null, true);
        echo "\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">Article précédent</a>
                    </div>
                    <div class=\"col-8\"></div>
                    <div class=\"col-2 m-*-auto\">
                        <a href=\"/article/";
        // line 70
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 70, $this->source); })()), "id", []) + 1), "html", null, true);
        echo "\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">Article suivant</a>
                    </div>
                </div>

            </div>
       

           <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>




 




";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "ValTom's !";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "article/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 6,  166 => 5,  132 => 70,  125 => 66,  113 => 57,  105 => 52,  98 => 48,  91 => 44,  84 => 40,  77 => 36,  53 => 14,  51 => 13,  43 => 7,  41 => 6,  37 => 5,  31 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}ValTom's !{% endblock %}</title>
        {% block stylesheets %}{% endblock %}

        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    </head>

    <body>

        {% include 'header.html' %}

         <div class=\"container\">

            <div class=\"row justify-content-md-center\">
               
                <div class=\"col-*-auto\">
                    <h1>ValTom's</h1>
                </div>
               
            </DIV>




                <div class=\"row justify-content-md-center\">
               
                    <div class=\"col-*-6 col-*-push-3\">

                        <table class=\"table\">
                            <tbody>
                                <tr>
                                    <th>Id</th>
                                    <td>{{ article.id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ article.title }}</td>
                                </tr>
                                <tr>
                                    <th>Subtitle</th>
                                    <td>{{ article.subtitle }}</td>
                                </tr>
                                <tr>
                                    <th>Corpus</th>
                                    <td>{{ article.corpus }}</td>
                                </tr>
                                <tr>
                                    <th>CreatedAt</th>
                                    <td>{{ article.createdAt ? article.createdAt|date('Y-m-d H:i:s') : '' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href=\"{{ path('article_index') }}\">back to list</a>

                    </div>

                </div>

                <div class=\"row justify-content-md-center\">
               
                    <div class=\"col-2 m-*-auto\">
                        <a href=\"/article/{{article.id - 1}}\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">Article précédent</a>
                    </div>
                    <div class=\"col-8\"></div>
                    <div class=\"col-2 m-*-auto\">
                        <a href=\"/article/{{article.id + 1}}\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">Article suivant</a>
                    </div>
                </div>

            </div>
       

           <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>




 




", "article/show.html.twig", "/home/kwet/Bureau/FI-Symfony/templates/article/show.html.twig");
    }
}
