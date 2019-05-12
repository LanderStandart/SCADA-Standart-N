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

/* menu_bend.html */
class __TwigTemplate_e54c8cf7ef8a9a3d32439e41a3c343dc7c5188ed9584005498df54392d8acf44 extends \Twig\Template
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
        echo "<!-- </ul>
</div> -->
</nav>
</div>
</span>
</div>

<div class=\"modal\" id=\"Login\" >
  <div class=\"modal-dialog login\">
    <div class=\"modal-content login\" >
      <div class=\"modal-header\"><div class=\"logo\"> </div>
        <h4 class=\"modal-title\">Авторизация</h4>   
      </div>

      <div class=\"modal-body\"> 
        <form action=\"./login.php\" method=\"post\">
          <div class=\"form-group\">
            <label for=\"Login\">Логин:</label>
            <input type=\"Login\" class=\"form-control\" name=\"login\" id=\"login\">
          </div>
          <div class=\"form-group\">
            <label for=\"Pass\">Пароль:</label>
            <input type=\"password\" class=\"form-control\" name=\"password\" id=\"password\">
          </div>
       <!-- Modal footer -->
          <div class=\"modal-footer\">
            <button type=\"submit\" class=\"btn btn-primary\" name=\"do_login\">Вход</button>
            <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Отмена</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 

<div class=\"container\">
";
    }

    public function getTemplateName()
    {
        return "menu_bend.html";
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
        return new Source("", "menu_bend.html", "C:\\Standart-N\\WAMP\\www\\sinhro_dev\\tmpl\\menu_bend.html");
    }
}
