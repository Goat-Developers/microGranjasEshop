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

/* @PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig */
class __TwigTemplate_1f41d8b16e363e247e15b8ba01e8647748c783d2ba8a5f4751245a1b4981f237 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'customer_form' => [$this, 'block_customer_form'],
            'customer_form_rest' => [$this, 'block_customer_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", 26)->unwrap();
        // line 27
        echo "
";
        // line 28
        $context["allowedNameChars"] = "0-9!<>,;?=+()@#\"°{}_\$%:";
        // line 29
        $context["isGuest"] = (((isset($context["isGuest"]) || array_key_exists("isGuest", $context))) ? (_twig_default_filter(($context["isGuest"] ?? null), false)) : (false));
        // line 30
        echo "
";
        // line 31
        $this->displayBlock('customer_form', $context, $blocks);
    }

    public function block_customer_form($context, array $blocks = [])
    {
        // line 32
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? null), 'form_start');
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">person</i>
        ";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer", [], "Admin.Global"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["customerForm"] ?? null), 'errors');
        echo "

          ";
        // line 42
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "gender_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Social title", [], "Admin.Global")]);
        // line 44
        echo "

          ";
        // line 46
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "first_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("First name", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only letters and the dot (.) character, followed by a space, are allowed.", [], "Admin.Orderscustomers.Help")]);
        // line 49
        echo "

          ";
        // line 51
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "last_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Last name", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only letters and the dot (.) character, followed by a space, are allowed.", [], "Admin.Orderscustomers.Help")]);
        // line 54
        echo "

          ";
        // line 56
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "email", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email", [], "Admin.Global")]);
        // line 58
        echo "

          ";
        // line 60
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "password", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password should be at least %length% characters long.", ["%length%" =>         // line 62
($context["minPasswordLength"] ?? null)], "Admin.Notifications.Info"), "class" => ((        // line 63
($context["isGuest"] ?? null)) ? ("d-none") : (""))]);
        // line 64
        echo "

          ";
        // line 66
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "birthday", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Birthday", [], "Admin.Orderscustomers.Feature")]);
        // line 68
        echo "

          ";
        // line 70
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "is_enabled", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enabled", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable customer login.", [], "Admin.Orderscustomers.Help")]);
        // line 73
        echo "

          ";
        // line 75
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "is_partner_offers_subscribed", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Partner offers", [], "Admin.Orderscustomers.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This customer will receive your ads via email.", [], "Admin.Orderscustomers.Help")]);
        // line 78
        echo "

          ";
        // line 80
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "group_ids", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Group access", [], "Admin.Orderscustomers.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select all the groups that you would like to apply to this customer.", [], "Admin.Orderscustomers.Help")]);
        // line 83
        echo "

          ";
        // line 85
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "default_group_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default customer group", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s %s", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This group will be the user's default group.", [], "Admin.Orderscustomers.Help"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Only the discount for the selected group will be applied to this customer.", [], "Admin.Orderscustomers.Help"))]);
        // line 88
        echo "

          ";
        // line 90
        if (($context["isB2bFeatureActive"] ?? null)) {
            // line 91
            echo "            ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "company_name", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Company", [], "Admin.Global")]);
            // line 93
            echo "

            ";
            // line 95
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "siret_code", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SIRET", [], "Admin.Orderscustomers.Feature")]);
            // line 97
            echo "

            ";
            // line 99
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "ape_code", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("APE", [], "Admin.Orderscustomers.Feature")]);
            // line 101
            echo "

            ";
            // line 103
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "website", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Website", [], "Admin.Orderscustomers.Feature")]);
            // line 105
            echo "

            ";
            // line 107
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "allowed_outstanding_amount", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Allowed outstanding amount", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s 0-9", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Valid characters:", [], "Admin.Orderscustomers.Help"))]);
            // line 110
            echo "

            ";
            // line 112
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "max_payment_days", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Maximum number of payment days", [], "Admin.Orderscustomers.Feature"), "help" => sprintf("%s 0-9", $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Valid characters:", [], "Admin.Orderscustomers.Help"))]);
            // line 115
            echo "

            ";
            // line 117
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["customerForm"] ?? null), "risk_id", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Risk rating", [], "Admin.Orderscustomers.Feature")]);
            // line 119
            echo "
          ";
        }
        // line 121
        echo "
          ";
        // line 122
        $this->displayBlock('customer_form_rest', $context, $blocks);
        // line 125
        echo "        </div>
      </div>
      <div class=\"card-footer\">
        ";
        // line 128
        if (((isset($context["displayInIframe"]) || array_key_exists("displayInIframe", $context)) && (($context["displayInIframe"] ?? null) == true))) {
            // line 129
            echo "          <a href=\"javascript:window.parent.\$.fancybox.close();\" class=\"btn btn-outline-secondary\">
        ";
        } else {
            // line 131
            echo "          <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension')->getPathWithBackUrl("admin_customers_index"), "html", null, true);
            echo "\" class=\"btn btn-outline-secondary\">
        ";
        }
        // line 133
        echo "          ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
        <button class=\"btn btn-primary float-right\">
          ";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  ";
        // line 140
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["customerForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 122
    public function block_customer_form_rest($context, array $blocks = [])
    {
        // line 123
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["customerForm"] ?? null), 'rest');
        echo "
          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 123,  222 => 122,  216 => 140,  209 => 136,  202 => 133,  196 => 131,  192 => 129,  190 => 128,  185 => 125,  183 => 122,  180 => 121,  176 => 119,  174 => 117,  170 => 115,  168 => 112,  164 => 110,  162 => 107,  158 => 105,  156 => 103,  152 => 101,  150 => 99,  146 => 97,  144 => 95,  140 => 93,  137 => 91,  135 => 90,  131 => 88,  129 => 85,  125 => 83,  123 => 80,  119 => 78,  117 => 75,  113 => 73,  111 => 70,  107 => 68,  105 => 66,  101 => 64,  99 => 63,  98 => 62,  97 => 60,  93 => 58,  91 => 56,  87 => 54,  85 => 51,  81 => 49,  79 => 46,  75 => 44,  73 => 42,  68 => 40,  61 => 36,  53 => 32,  47 => 31,  44 => 30,  42 => 29,  40 => 28,  37 => 27,  35 => 26,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Customer/Blocks/form.html.twig", "C:\\xampp\\htdocs\\microGranjasEshop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Customer\\Blocks\\form.html.twig");
    }
}
