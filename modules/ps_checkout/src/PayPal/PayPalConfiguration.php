<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
 */

namespace PrestaShop\Module\PrestashopCheckout\PayPal;

use PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfiguration;
use PrestaShop\Module\PrestashopCheckout\Exception\PsCheckoutException;
use PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository;
use PrestaShop\Module\PrestashopCheckout\Settings\RoundingSettings;

class PayPalConfiguration
{
    const INTENT = 'PS_CHECKOUT_INTENT';
    const PAYMENT_MODE = 'PS_CHECKOUT_MODE';
    const CARD_PAYMENT_ENABLED = 'PS_CHECKOUT_CARD_PAYMENT_ENABLED';
    const PS_ROUND_TYPE = 'PS_ROUND_TYPE';
    const PS_PRICE_ROUND_MODE = 'PS_PRICE_ROUND_MODE';
    const PAYMENT_METHODS_ORDER = 'PS_CHECKOUT_PAYMENT_METHODS_ORDER';
    const INTEGRATION_DATE = 'PS_CHECKOUT_INTEGRATION_DATE';
    const HOSTED_FIELDS_3DS_DISABLED = 'PS_CHECKOUT_3DS_DISABLED';
    const CSP_NONCE = 'PS_CHECKOUT_CSP_NONCE';
    const PS_CHECKOUT_PAYPAL_CB_INLINE = 'PS_CHECKOUT_PAYPAL_CB_INLINE';

    /**
     * @var PrestaShopConfiguration
     */
    private $configuration;

    /**
     * @var PayPalCodeRepository
     */
    private $codeRepository;

    public function __construct(PrestaShopConfiguration $configuration, PayPalCodeRepository $codeRepository)
    {
        $this->configuration = $configuration;
        $this->codeRepository = $codeRepository;
    }

    /**
     * Used to return the PS_CHECKOUT_INTENT from the Configuration
     *
     * @return string
     */
    public function getIntent()
    {
        return Intent::CAPTURE === $this->configuration->get(self::INTENT) ? Intent::CAPTURE : Intent::AUTHORIZE;
    }

    /**
     * Used to set the PS_CHECKOUT_INTENT in the Configuration
     *
     * @param $captureMode
     *
     * @throws PsCheckoutException
     */
    public function setIntent($captureMode)
    {
        if (!in_array($captureMode, [Intent::CAPTURE, Intent::AUTHORIZE])) {
            throw new \UnexpectedValueException(sprintf('The value should be an Intent constant, %s value sent', $captureMode));
        }

        $this->configuration->set(self::INTENT, $captureMode);
    }

    /**
     * Used to return the PS_CHECKOUT_MODE from the Configuration
     *
     * @return string
     */
    public function getPaymentMode()
    {
        return Mode::LIVE === $this->configuration->get(self::PAYMENT_MODE) ? Mode::LIVE : Mode::SANDBOX;
    }

    /**
     * Used to set the PS_CHECKOUT_MODE in the Configuration
     *
     * @param $paymentMode
     *
     * @throws PsCheckoutException
     */
    public function setPaymentMode($paymentMode)
    {
        if (!in_array($paymentMode, [Mode::LIVE, Mode::SANDBOX])) {
            throw new \UnexpectedValueException(sprintf('The value should be a Mode constant, %s value sent', $paymentMode));
        }

        $this->configuration->set(self::PAYMENT_MODE, $paymentMode);
    }

    /**
     * @param bool $status
     *
     * @throws PsCheckoutException
     */
    public function setCardPaymentEnabled($status)
    {
        $this->configuration->set(self::CARD_PAYMENT_ENABLED, (int) $status);
    }

    /**
     * @return bool
     */
    public function isCardPaymentEnabled()
    {
        return (bool) $this->configuration->get(self::CARD_PAYMENT_ENABLED);
    }

    /**
     * @param bool $status
     *
     * @throws PsCheckoutException
     */
    public function setCardInlinePaypalEnabled($status)
    {
        $this->configuration->set(self::PS_CHECKOUT_PAYPAL_CB_INLINE, (int) $status);
    }

    /**
     * @return bool
     */
    public function isCardInlinePaypalIsEnabled()
    {
        return (bool) $this->configuration->get(self::PS_CHECKOUT_PAYPAL_CB_INLINE);
    }

    /**
     * @param $roundType
     *
     * @throws PsCheckoutException
     */
    public function setRoundType($roundType)
    {
        if (!in_array($roundType, [RoundingSettings::ROUND_ON_EACH_ITEM])) {
            throw new \UnexpectedValueException(sprintf('The value should be a RoundingSettings constant, %s value sent', $roundType));
        }

        $this->configuration->set(self::PS_ROUND_TYPE, $roundType);
    }

    /**
     * @param string $priceRoundMode
     *
     * @throws PsCheckoutException
     */
    public function setPriceRoundMode($priceRoundMode)
    {
        if (!in_array($priceRoundMode, [RoundingSettings::ROUND_UP_AWAY_FROM_ZERO])) {
            throw new \UnexpectedValueException(sprintf('The value should be a RoundingSettings constant, %s value sent', $priceRoundMode));
        }

        $this->configuration->set(self::PS_PRICE_ROUND_MODE, $priceRoundMode);
    }

    /**
     * Check if the rounding configuration if correctly set
     *
     * PS_ROUND_TYPE need to be set to 1 (Round on each item)
     * PS_PRICE_ROUND_MODE need to be set to 2 (Round up away from zero, when it is half way there)
     *
     * @return bool
     */
    public function IsRoundingSettingsCorrect()
    {
        return $this->configuration->get(self::PS_ROUND_TYPE) === RoundingSettings::ROUND_ON_EACH_ITEM
            && $this->configuration->get(self::PS_PRICE_ROUND_MODE) === RoundingSettings::ROUND_UP_AWAY_FROM_ZERO;
    }

    /**
     * Used to return the PS_ROUND_TYPE from the Configuration
     *
     * @return string
     */
    public function getRoundType()
    {
        return $this->configuration->get(self::PS_ROUND_TYPE);
    }

    /**
     * Used to return the PS_PRICE_ROUND_MODE from the Configuration
     *
     * @return string
     */
    public function getPriceRoundMode()
    {
        return $this->configuration->get(self::PS_PRICE_ROUND_MODE);
    }

    /**
     * @return string
     */
    public function getIntegrationDate()
    {
        return $this->configuration->get(static::INTEGRATION_DATE, ['default' => \Ps_checkout::INTEGRATION_DATE]);
    }

    /**
     * @return string
     */
    public function getCSPNonce()
    {
        return $this->configuration->get(static::CSP_NONCE, ['default' => '']);
    }

    /**
     * @return bool
     */
    public function is3dSecureEnabled()
    {
        return false === (bool) $this->configuration->get(static::HOSTED_FIELDS_3DS_DISABLED);
    }

    /**
     * Get the incompatible ISO country codes with Paypal.
     *
     * @return array
     */
    public function getIncompatibleCountryCodes()
    {
        $db = \Db::getInstance();
        $shopCodes = $db->executeS(
            "SELECT c.iso_code
            FROM ps_country c
            JOIN ps_module_country mc ON mc.id_country = c.id_country
            JOIN ps_module m ON m.id_module = mc.id_module
            WHERE c.active = 1
            AND m.name = 'ps_checkout'
            AND mc.id_shop = " . \Context::getContext()->shop->id
        );
        $paypalCodes = $this->codeRepository->getCountryCodes();

        return $this->checkCodesCompatibility($shopCodes, $paypalCodes);
    }

    /**
     * Get the incompatible ISO currency codes with Paypal.
     *
     * @return array
     */
    public function getIncompatibleCurrencyCodes()
    {
        $db = \Db::getInstance();
        $shopCodes = $db->executeS(
            "SELECT c.iso_code
            FROM ps_currency c
            JOIN ps_module_currency mc ON mc.id_currency = c.id_currency
            JOIN ps_module m ON m.id_module = mc.id_module
            WHERE c.active = 1
            AND m.name = 'ps_checkout'
            AND mc.id_shop = " . \Context::getContext()->shop->id
        );
        $paypalCodes = $this->codeRepository->getCurrencyCodes();

        return $this->checkCodesCompatibility($shopCodes, $paypalCodes);
    }

    /**
     * Check shop codes compatibility with Paypal
     *
     * @param array $shopCodes
     * @param array $paypalCodes
     *
     * @return array|null
     */
    private function checkCodesCompatibility($shopCodes, $paypalCodes)
    {
        $incompatibleCodes = [];

        foreach ($shopCodes as $shopCode) {
            if (!in_array(strtoupper($shopCode['iso_code']), array_keys($paypalCodes))) {
                $incompatibleCodes[] = $shopCode['iso_code'];
            }
        }

        if (empty($incompatibleCodes)) {
            $incompatibleCodes = null;
        }

        return $incompatibleCodes;
    }
}
