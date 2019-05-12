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

/* base.html */
class __TwigTemplate_2bcc6a0102f2648431a0a5d49f29b4a214a5bfd5df3e422d9f56005fa3a4e0cb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "
<div class=\"row\" style=\"min-height:1rem\"> </div>
<div class=\"row\" style=\"min-height:15rem\" >
  <div class=\"col-3\" style=\"font-size: 1.2rem;text-align:center\">
  ";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        // line 6
        echo "  </div>
  <div class=\"col-8\">
    <div id=\"content\">
     ";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "    </div>
   </div>
 </div>

";
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        echo " ";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        // line 10
        echo "
     ";
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function getDebugInfo()
    {
        return array (  64 => 10,  61 => 9,  55 => 5,  47 => 12,  45 => 9,  40 => 6,  38 => 5,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "base.html", "C:\\Standart-N\\WAMP\\www\\sinhro_dev\\tmpl\\base.html");
    }
}
