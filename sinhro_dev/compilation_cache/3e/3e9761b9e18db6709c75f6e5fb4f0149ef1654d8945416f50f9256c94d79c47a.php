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

/* menu.php */
class __TwigTemplate_3fad14cfaea94dee0be16b61d2e079c205fa7158aa2321d8b9f846cc7cc56fb1 extends \Twig\Template
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
          <!--monitor-->
          ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["item"]) ? $context["item"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 16
            echo "              <li class=\"nav-item\"><a class=\"nav-link\" style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["items"], "display", []), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["items"], "url", []), "html", null, true);
            echo "\" > ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["items"], "itemname", []), "html", null, true);
            echo "</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
     <!--      <li class=\"nav-item\"><a class=\"nav-link\" style=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "display", []), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "url", []), "html", null, true);
        echo "\" > ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "itemname", []), "html", null, true);
        echo "</a></li>
          <li class=\"nav-item\"><a class=\"nav-link\" href=\"./malohod.php\">Малоходовка <span class=\"badge badge-danger\">:=count=:</span></a></li>
 -->
           <div class=\"dropdown\">
            <a id=\"dLabel\" role=\"button\" data-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\" data-target=\"#\" href=\"/page.html\">
                Настройки <span class=\"caret\"></span>
            </a>
        <ul class=\"dropdown-menu multi-level\" role=\"menu\" aria-labelledby=\"dropdownMenu\">
             <!--  <li><a class=\"dropdown-item\" href=\"#\">Some action</a></li>
              <li><a class=\"dropdown-item\" href=\"#\">Some other action</a></li>
              <li class=\"divider\"></li> -->
              <li class=\"dropdown-submenu\">
                <a class=\"dropdown-item\" tabindex=\"-1\" href=\"#\">Серверы синхронизации</a>
                <ul class=\"dropdown-menu\">
                  <!-- <li><a tabindex=\"-1\" href=\"#\">Second level</a></li>
                  <li class=\"dropdown-submenu\">
                    <a href=\"#\">Even More..</a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#\">3rd level</a></li>
                      <li><a href=\"#\">3rd level</a></li>
                    </ul>
                  </li> -->
                  <li><a class=\"dropdown-item\" href=\"./serverlist.php\">Список серверов</a></li>
                  <li><a class=\"dropdown-item\" data-toggle=\"modal\" data-target=\"#myModal\" href=\"#\">Добавить новый сервер</a></li>
                  <li><a class=\"dropdown-item\" href=\"./delete_server.php\">Удалить сервер</a></li>
                </ul>
              </li>
              <!--reg_user-->
            </ul>
        </div>

       <li class=\"nav-item\"><a class=\"nav-link\" href=\"./faq_sinhro.php\">F.A.Q. Ошибки синхронизации </a></li>
    </div> 
    <div class=\"col3\"> 
    <ul class=\"navbar-nav mr-auto multi-level\">  
       <li class=\"nav-item\"><a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#Login\" href=\"#\">Войти </a></li>
     </ul>  
     </div>  
     </span>     
         <!--  <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">Настройки</a>
            
            <div class=\"dropdown-menu\">
              <a class=\"nav-link dropdown-item\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown-submenu\">Серверы синхронизации</a>
              <div class=\"dropdown-submenu\"
                <a class=\"dropdown-item\" href=\"./serverlist.php\">Список серверов</a>
                <a class=\"dropdown-item\"  data-toggle=\"modal\" data-target=\"#myModal\" href=\"#\">Добавить новый сервер</a>
                <a class=\"dropdown-item\" href=\"./delete_server.php\">Удалить сервер</a>
              </div>  
            </div> 
          
          </li> -->

         <!--  <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">Общий заказ KZ<span class=\"badge badge-warning\">в разработке</span></a>
          <div class=\"dropdown-menu\">
              <a class=\"dropdown-item\" href=\"./oz_suppls.php\">Поставщики</a>
              <a class=\"dropdown-item\" href=\"./oz_clients.php\">Получатели</a>
          </div> </li> -->


        <!-- The Modal -->
          <div class=\"modal\" id=\"myModal\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">

                <!-- Modal Header -->
                <div class=\"modal-header\">
                  <h4 class=\"modal-title\">Добавление нового сервера</h4>
                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>

                </div>

                <!-- Modal body -->
                <form action=\"./addserv.php\" method=\"post\">
                  <div class=\"modal-body\">
                  
                      <div class=\"form-group\">
                        <label for=\"nameserver\">Имя сервера:</label>
                        <input type=\"nameserver\" class=\"form-control\" name=\"nameserver\" id=\"nameserver\">
                      </div>
                      <div class=\"form-group\">
                        <label for=\"url\">URL:</label>
                        <input type=\"url\" class=\"form-control\" name=\"url\" id=\"url\">
                      </div>
                  </div>
                  <!-- Modal footer -->
                  <div class=\"modal-footer\">
                    <button type=\"submit\" class=\"btn btn-primary\">Добавить</button>
                    <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Отмена</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class=\"modal\" id=\"Update\">
            <div class=\"modal-dialog\">
              <div class=\"modal-content\">
                <div class=\"modal-header\">
                  <h4 class=\"modal-title\">Обновляем данные</h4>   
                </div>
                <div class=\"modal-body\"> 
                Подождите !!!  
                </div>

              </div>
            </div> 
          </div>

        </ul>
      </div>
    </nav>
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

<script type=\"text/javascript\"> 
            
      \$('#Update').on('show.bs.modal', function() {
       
        document.location.href = \"./getdata.php\";
  
      })
</script>";
    }

    public function getTemplateName()
    {
        return "menu.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 19,  63 => 18,  50 => 16,  46 => 15,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "menu.php", "C:\\Standart-N\\WAMP\\www\\sinhro_dev\\tmpl\\menu.php");
    }
}
