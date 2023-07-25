<?php

/**
 * This file is not for use.
 * It provides a ready to use form as its content can be copied and used where a form is needed in the appication
 */
require __DIR__ . '/form.php';

// Instantiate Form and Create Form Members
$newForm = new src\utils\Form();
$newForm->createForm(formID: "", formName: "", formMethod: "", formAction: "");
if (isset($_SESSION['errorAlertMsg'])) {
    $errorAlertMsg = sprintf("%s", $_SESSION['errorAlertMsg']);
    $newForm->errorAlert("danger", $errorAlertMsg);
}
unset($_SESSION['errorAlertMsg']);

if (isset($_SESSION['successAlertMsg'])) {
    $successAlertMsg = sprintf("%s", $_SESSION['successAlertMsg']);
    $newForm->errorAlert("success", $successAlertMsg);
}
unset($_SESSION['successAlertMsg']);

/** Form Field: Text/Email, Password, Time, Date, Number, Range */
$newForm->formDiv(divID: "", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");
$newForm->formField(inputID: "", inputName: "", inputType: "text", inputClass: "form-control", inputPlaceholder: "");
if (isset($_SESSION['errors'][''])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['']);
    $newForm->fieldErrorAlert(alertClass: "is-invalid", alertMsg: $alertMsg);
}

/** Form Radio Field */
$newForm->formDiv(divID: "", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-row mb-2");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formRadio(inputID: "", inputName: "", inputType: "radio", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formRadio(inputID: "", inputName: "", inputType: "radio", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formRadio(inputID: "", inputName: "", inputType: "radio", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

/** Form Check Field */
$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-row mb-2");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formCheckBox(inputID: "", inputName: "", inputType: "checkbox", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formCheckBox(inputID: "", inputName: "", inputType: "checkbox", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

$newForm->formDiv(divID: "", divClass: "form-check-inline");
$newForm->formCheckBox(inputID: "", inputName: "", inputType: "checkbox", inputClass: "form-check-input", inputValue: "");
$newForm->formLabel(labelID: "", labelClass: "form-check-label", labelTitle: "");

/** Form File Upload */
$newForm->formDiv(divID: "", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");
$newForm->formFileUpload(fileInputID: "", fileInputName: "", acceptFileType: "", fileInputClass: "form-control", multiple: null, disabled: null);
if (isset($_SESSION['errors'][''])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['']);
    $newForm->fieldErrorAlert(alertClass: "is-invalid", alertMsg: $alertMsg);
}

/** Form Select Field */
$newForm->formDiv(divID: "", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");
$newForm->formSelect(selectID: "", selectName: "", selectClass: "form-select", options: ["" => "--Click to Select--", "" => "", "" => "", "" => ""], selectedValue: "--Click to Select--");

/** Form TextArea */
$newForm->formDiv(divID: "", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "", labelClass: "form-label", labelTitle: "");
$newForm->formTextArea(textareaID: "", textareaName: "", textareaClass: "form-control", textareaPlaceholder: "");
if (isset($_SESSION['errors'][''])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['']);
    $newForm->fieldErrorAlert(alertClass: "is-invalid", alertMsg: $alertMsg);
}

unset($_SESSION['errors']);

/** Form Submit Button */
$newForm->formDiv(divID: "submitButton", divClass: "form-group mb-3");
$newForm->formButton(buttonID: "submitButton", buttonName: "", buttonType: "submit", buttonClass: "btn btn-sm btn-primary", buttonTitle: "Submit");

// Render Form
// echo $newForm->render();
echo $newForm;
