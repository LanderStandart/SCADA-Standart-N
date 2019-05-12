<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* menu_base.html */
class __TwigTemplate_41e2658d2c48ea5d268e2f7e26ca6fa9f3860df4d6e61ac419be5199e823ae3a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div>
   <span>
   <div class=\"col8\"> 
    <nav class=\"navbar navbar-expand-md bg-dark navbar-dark\">
      
          <a class=\"navbar-brand\" href=\"./index.php\"><div class=\"logo\"></div> </a>
     

          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#nav1\">
            <span class=\"navbar-toggler-icon\"></span>
          </button>
          <div id=\"nav1\" class=\"collapse navbar-collapse \">
            <ul class=\"navbar-nav mr-auto multi-level\">
                   
   ";
    }

    public function getTemplateName()
    {
        return "menu_base.html";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "menu_base.html", "C:\\Standart-N\\WAMP\\www\\sinhro_dev\\tmpl\\menu_base.html");
    }
}
