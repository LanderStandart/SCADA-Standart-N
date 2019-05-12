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

/* menu.html */
class __TwigTemplate_b1b7f042534c970ab91b4ef620186cb8ea101b1ce56b57b8f0bf145d17f2142b extends \Twig\Template
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
        echo "            
                ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sidebarMenu"]) ? $context["sidebarMenu"] : null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "                    ";
            $context["ul"] = "";
            $context["li"] = "";
            $context["a"] = "";
            $context["end"] = "";
            $context["endf"] = "";
            // line 4
            echo "              
                          ";
            // line 5
            if ( !(null === $this->getAttribute($context["item"], "root", []))) {
                // line 6
                echo "                              ";
                if (( !$this->getAttribute($context["item"], "root", []) == "1")) {
                    echo "                          
                                  ";
                    // line 7
                    $context["li"] = "<div class=\"dropdown\">";
                    // line 8
                    echo "                                  ";
                    $context["a"] = "<a id=\"dLabel\" role=\"button\" data-toggle=\"dropdown\" class=\"nav-link dropdown-toggle\" data-target=\"#\"  ";
                    // line 9
                    echo "                                  ";
                    $context["end"] = "</a>";
                    // line 10
                    echo "                                  ";
                    $context["endf"] = "</div>";
                    echo " 
                               ";
                } else {
                    // line 11
                    echo "     
                                  ";
                    // line 12
                    $context["li"] = "<li class=\"nav-item\">";
                    // line 13
                    echo "                                  ";
                    $context["a"] = "<a class=\"nav-link\"";
                    // line 14
                    echo "                                  ";
                    $context["end"] = "</a></li>";
                    echo "                                  
                              ";
                }
                // line 16
                echo "                              ";
            } else {
                // line 17
                echo "                              ";
                if ( !(null === $this->getAttribute($context["item"], "id", []))) {
                    // line 18
                    echo "                                      ";
                    $context["li"] = "<ul class=\"dropdown-menu multi-level\" role=\"menu\" aria-labelledby=\"dropdownMenu\"><li class=\"dropdown-submenu\">";
                    // line 19
                    echo "                                      ";
                    $context["a"] = "<a class=\"dropdown-item\" tabindex=\"-1\"";
                    echo " 
                                      ";
                    // line 20
                    $context["end"] = "</a>";
                    echo " 
                                      ";
                    // line 21
                    $context["endf"] = "</li>";
                    // line 22
                    echo "                              ";
                } else {
                    // line 23
                    echo "                                      ";
                    if ( !(null === $this->getAttribute($context["item"], "id1", []))) {
                        // line 24
                        echo "                                        ";
                        $context["li"] = "<ul class=\"dropdown-menu multi-level\" role=\"menu\" aria-labelledby=\"dropdownMenu\"><li>";
                        // line 25
                        echo "                                        ";
                        $context["a"] = "<a class=\"dropdown-item\" ";
                        echo " 
                                        ";
                        // line 26
                        $context["end"] = "</a></li>";
                        // line 27
                        echo "                                        ";
                        $context["endf"] = "";
                        echo "      
                                      ";
                    } else {
                        // line 29
                        echo "                                        ";
                        $context["li"] = "<li class=\"dropdown-submenu\">";
                        echo " 
                                        ";
                        // line 30
                        $context["a"] = "<a class=\"dropdown-item\"";
                        echo " 
                                        ";
                        // line 31
                        $context["end"] = "</a></li>";
                        echo " 
                                        ";
                        // line 32
                        $context["endf"] = "";
                        echo " 
                                      ";
                    }
                    // line 33
                    echo "         
                              ";
                }
                // line 35
                echo "                              ";
                if ( !(null === $this->getAttribute($context["item"], "child", []))) {
                    // line 36
                    echo "                                ";
                    $context["endf"] = "</ul>";
                    echo " 
                              ";
                }
                // line 37
                echo "  
                                    

                         ";
            }
            // line 41
            echo "                       ";
            $context["title"] = $this->getAttribute($context["item"], "title", []);
            echo "     
                      ";
            // line 42
            if ( !(null === $this->getAttribute($context["item"], "log_in", []))) {
                // line 43
                echo "                        ";
                $context["li"] = "<li class=\"nav-item\">";
                // line 44
                echo "                        ";
                $context["a"] = "<a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#Login\" ";
                // line 45
                echo "                        ";
                $context["end"] = "</a></li>";
                echo " 
                        ";
                // line 46
                if ( !(null === $this->getAttribute((isset($context["LogIn"]) ? $context["LogIn"] : null), "login", []))) {
                    // line 47
                    echo "                          ";
                    $context["title"] = $this->getAttribute((isset($context["LogIn"]) ? $context["LogIn"] : null), "login", []);
                    // line 48
                    echo "                        ";
                } else {
                    echo "   
                          ";
                    // line 49
                    $context["title"] = $this->getAttribute($context["item"], "title", []);
                    echo " 
                        ";
                }
                // line 50
                echo "    
                      ";
            }
            // line 51
            echo "  


                         ";
            // line 54
            echo (isset($context["li"]) ? $context["li"] : null);
            echo " 
                         ";
            // line 55
            echo (isset($context["a"]) ? $context["a"] : null);
            echo " href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "href", []), "html", null, true);
            echo "\"> ";
            echo (isset($context["title"]) ? $context["title"] : null);
            echo (isset($context["end"]) ? $context["end"] : null);
            echo (isset($context["ul"]) ? $context["ul"] : null);
            echo "   
                                         
                            ";
            // line 57
            if ( !(null === $this->getAttribute($context["item"], "childs", []))) {
                // line 58
                echo "                              ";
                echo twig_include($this->env, $context, $this, ["sidebarMenu" => $this->getAttribute($context["item"], "childs", [])]);
                echo "
                            ";
            }
            // line 60
            echo "                             ";
            if ( !(null === $this->getAttribute($context["item"], "child", []))) {
                // line 61
                echo "                              ";
                echo twig_include($this->env, $context, $this, ["sidebarMenu" => $this->getAttribute($context["item"], "child", [])]);
                echo "
                            ";
            }
            // line 63
            echo "                  
                 ";
            // line 64
            echo (isset($context["endf"]) ? $context["endf"] : null);
            echo "
 ";
            // line 65
            $context["endf"] = "";
            echo " 
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "
";
        // line 68
        echo (isset($context["endf"]) ? $context["endf"] : null);
        echo "            

";
    }

    public function getTemplateName()
    {
        return "menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 68,  271 => 67,  255 => 65,  251 => 64,  248 => 63,  242 => 61,  239 => 60,  233 => 58,  231 => 57,  220 => 55,  216 => 54,  211 => 51,  207 => 50,  202 => 49,  197 => 48,  194 => 47,  192 => 46,  187 => 45,  184 => 44,  181 => 43,  179 => 42,  174 => 41,  168 => 37,  162 => 36,  159 => 35,  155 => 33,  150 => 32,  146 => 31,  142 => 30,  137 => 29,  131 => 27,  129 => 26,  124 => 25,  121 => 24,  118 => 23,  115 => 22,  113 => 21,  109 => 20,  104 => 19,  101 => 18,  98 => 17,  95 => 16,  89 => 14,  86 => 13,  84 => 12,  81 => 11,  75 => 10,  72 => 9,  69 => 8,  67 => 7,  62 => 6,  60 => 5,  57 => 4,  50 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "menu.html", "C:\\Standart-N\\WAMP\\www\\sinhro_dev\\tmpl\\menu.html");
    }
}
