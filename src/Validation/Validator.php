<?php
namespace Src\Validation;

class Validator {
    private array $data;
    private array $rules;
    private array $errors = [];

    private function __construct($data, $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }
    public static function make($data, $rules) {
        return new self($data, $rules);
    }
    public function fails() {
        $this->errors = [];
        foreach ($this->rules as $field => $ruleSet) {
            $val = $this->data[$field] ?? null;
            $rules = explode('|', $ruleSet);

            foreach ($rules as $rule) {

                // Rule: required
                if ($rule === 'required' && ($val === null || $val === '')) {
                    $this->errors[$field][] = 'required';
                }
                // Rule: min
                elseif (str_starts_with($rule, 'min:') && is_string($val)) {
                    $min = (int)substr($rule, 4);
                    if (strlen((string)$val) < $min)
                        $this->errors[$field][] = "min:$min";
                }

                // Rule: max
                elseif (str_starts_with($rule, 'max:') && is_string($val)) {
                    $max = (int)substr($rule, 4);
                    if (strlen((string)$val) > $max)
                        $this->errors[$field][] = "max:$max";
                }

                // Rule: email
                elseif ($rule === 'email' && $val !== null && !filter_var($val, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = 'email';
                }

                // Rule: enum
                elseif (str_starts_with($rule, 'enum:')) {
                    $opts = explode(',', substr($rule, 5));
                    if ($val !== null && !in_array($val, $opts, true))
                        $this->errors[$field][] = 'enum';
                }

                // Rule: numeric
                elseif ($rule === 'numeric' && $val !== null && !is_numeric($val)) {
                    $this->errors[$field][] = 'numeric';
                }

                // Rule: integer
                elseif ($rule === 'integer' && $val !== null && filter_var($val, FILTER_VALIDATE_INT) === false) {
                    $this->errors[$field][] = 'integer';
                }
            }
        }

        return !empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public static function sanitize(array $in) {
        foreach ($in as $k => $v) {
            if (is_string($v)) {
                $in[$k] = trim($v);
            }
        }
        return $in;
    }
}