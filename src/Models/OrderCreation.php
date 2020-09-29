<?php

namespace MoneyCare\Models;

use MoneyCare\Dictionaries\FormModesDictionary;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use DateTime;
use MoneyCare\Exceptions\PredefinedValue\FormModeException;

/**
 * Class OrderCreation
 *
 * @package MoneyCare\Models
 */
class OrderCreation extends Model
{
    /**
     * @var string
     */
    protected $orderId;
    
    /**
     * @var string
     */
    protected $pointId;

    /**
     * @var string
     */
    protected $operatorId;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $secondName;

    /**
     * @var DateTime
     */
    protected $birthDay;

    /**
     * @var Passport
     */
    protected $passport;

    /**
     * @var string
     */
    protected $phone;
    
    /**
     * @var int
     */
    protected $score;

    /**
     * @var Good[]
     */
    protected $goods;

    /**
     * @var float
     */
    protected $downPayment;

    /**
     * @var int
     */
    protected $creditPeriod;

    /**
     * @var CreditType[]
     */
    protected $creditTypes;

    /**
     * @var int[]
     */
    protected $installmentPeriods;

    /**
     * @var float
     */
    protected $maxDiscount;

    /**
     * @var bool
     */
    protected $forceScore;

    /**
     * @var bool
     */
    protected $generateForm = false;

    /**
     * @var string
     */
    protected $formMode     = 'standalone';

    /**
     * @var string
     */
    protected $formSuccessUrl;

    /**
     * @var string
     */
    protected $formCancelUrl;

    /**
     * @var Offer[]
     */
    protected $offers;

    /**
     * @return string[]
     */
    protected function getRequired(): array
    {
        return [
            'goods',
            'pointId',
        ];
    }

    /**
     * @param string $orderId
     *
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @param string $operatorId
     *
     * @return $this
     */
    public function setOperatorId(string $operatorId): self
    {
        $this->operatorId = $operatorId;

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param int $score
     *
     * @return $this
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @param float $downPayment
     *
     * @return $this
     */
    public function setDownPayment(float $downPayment): self
    {
        $this->downPayment = $downPayment;

        return $this;
    }

    /**
     * @param int $creditPeriod
     *
     * @return $this
     */
    public function setCreditPeriod(int $creditPeriod): self
    {
        $this->creditPeriod = $creditPeriod;

        return $this;
    }

    /**
     * @param CreditType $creditType
     *
     * @return $this
     * @throws ModelRequiredFieldException
     */
    public function addCreditType(CreditType $creditType): self
    {
        if ($this->creditTypes === null) {
            $this->creditTypes = [];
        }

        $this->creditTypes[] = $creditType->getData()['creditType'];

        return $this;
    }

    /**
     * @param float $maxDiscount
     *
     * @return $this
     */
    public function setMaxDiscount(float $maxDiscount): self
    {
        $this->maxDiscount = $maxDiscount;

        return $this;
    }

    /**
     * @param bool $generateForm
     *
     * @return $this
     */
    public function setGenerateForm(bool $generateForm): self
    {
        $this->generateForm = $generateForm;

        return $this;
    }

    /**
     * @param string $formMode
     *
     * @return $this
     * @throws FormModeException
     */
    public function setFormMode(string $formMode): self
    {
        if (FormModesDictionary::exists($formMode)) {
            throw new FormModeException();
        }

        $this->formMode = $formMode;

        return $this;
    }

    /**
     * @param string $formSuccessUrl
     *
     * @return $this
     */
    public function setFormSuccessUrl(string $formSuccessUrl): self
    {
        $this->formSuccessUrl = $formSuccessUrl;

        return $this;
    }

    /**
     * @param string $formCancelUrl
     *
     * @return $this
     */
    public function setFormCancelUrl(string $formCancelUrl): self
    {
        $this->formCancelUrl = $formCancelUrl;

        return $this;
    }

    /**
     * @param int $period
     *
     * @return $this
     */
    public function addInstallmentPeriod(int $period): self
    {
        if ($this->installmentPeriods === null) {
            $this->installmentPeriods = [];
        }

        $this->installmentPeriods[] = $period;

        return $this;
    }

    /**
     * @param Offer $offer
     *
     * @return $this
     * @throws ModelRequiredFieldException
     */
    public function addOffer(Offer $offer): self
    {
        if ($this->offers === null) {
            $this->offers = [];
        }

        $this->offers[] = $offer->getData();

        return $this;
    }

    /**
     * @param string $pointId
     *
     * @return $this
     */
    public function setPointId(string $pointId): self
    {
        $this->pointId = $pointId;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $secondName
     *
     * @return $this
     */
    public function setSecondName(string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * @param DateTime $birthDay
     *
     * @return $this
     */
    public function setBirthDay(DateTime $birthDay): self
    {
        $this->birthDay = $birthDay->format('Y-m-d');

        return $this;
    }

    /**
     * @param bool $isForceScore
     *
     * @return $this
     */
    public function setForceScore(bool $isForceScore): self
    {
        $this->forceScore = $isForceScore;

        return $this;
    }

    /**
     * @param Passport $model
     *
     * @return $this
     * @throws ModelRequiredFieldException
     */
    public function setPassport(Passport $model): self
    {
        $this->passport = $model->getData();

        return $this;
    }

    /**
     * @param Good $good
     *
     * @return $this
     * @throws ModelRequiredFieldException
     */
    public function addGood(Good $good): self
    {
        if ($this->goods === null) {
            $this->goods = [];
        }

        $this->goods[] = $good->getData();

        return $this;
    }

    /**
     * @param string $field
     * @param        $value
     *
     * @return bool
     * @throws ModelRequiredFieldException
     */
    protected function validateField(string $field, $value): bool
    {
        return $this->validateForceScoreFields() && parent::validateField($field, $value);
    }

    /**
     * @return bool
     * @throws ModelRequiredFieldException
     */
    protected function validateForceScoreFields(): bool
    {
        if ($this->forceScore === true) {
            $fields = [
                'firstName',
                'lastName',
                'secondName',
                'birthDay',
                'passport',
            ];

            foreach ($fields as $field) {
                if ($this->$field === null) {
                    throw new ModelRequiredFieldException($field, $this);
                }
            }
        }

        return true;
    }
}