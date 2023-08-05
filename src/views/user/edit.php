<?php
// views/user/edit.php

declare(strict_types=1);

use utils\Form;

// Instantiate Form and Create Form Members
$newForm = new Form();

$basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__ . '/../'));
$formAction = $basePath . '/Controller/UserController.php?action=update';

$newForm->createForm(formID: "editUser", formName: "editUser", formMethod: "post", formAction: $formAction, enctype: "");
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

/** Form Field: Student Name */
$newForm->formDiv(divID: "name", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "name", labelClass: "form-label", labelTitle: "Name:");
$newForm->formField(inputID: "name", inputName: "studentName", inputType: "text", inputClass: "form-control", inputPlaceholder: "Enter first and last names", value: "");
if (isset($_SESSION['errors']['studentName'])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['studentName']);
    $newForm->fieldErrorAlert(alertClass: "text-red is-invalid", alertMsg: $alertMsg);
}

/** Form Field: Student Email */
$newForm->formDiv(divID: "email", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "email", labelClass: "form-label", labelTitle: "Email:");
$newForm->formField(inputID: "email", inputName: "studentEmail", inputType: "text", inputClass: "form-control", inputPlaceholder: "Enter email:", value: "");
if (isset($_SESSION['errors']['studentEmail'])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['studentEmail']);
    $newForm->fieldErrorAlert(alertClass: "text-red is-invalid", alertMsg: $alertMsg);
}

/** Form Radio Field: Course */
$newForm->formDiv(divID: "course", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "course", labelClass: "form-label", labelTitle: "Select Course");

$newForm->formDiv(divID: "courseRow", divClass: "form-row mb-2");

$newForm->formDiv(divID: "frontend", divClass: "form-check-inline");
$newForm->formRadio(inputID: "frontend", inputName: "course", inputType: "radio", inputClass: "form-check-input", inputValue: "frontend", checked: null, disabled: "disabled");
$newForm->formLabel(labelID: "frontend", labelClass: "form-check-label", labelTitle: "Frontend");

$newForm->formDiv(divID: "backend", divClass: "form-check-inline");
$newForm->formRadio(inputID: "backend", inputName: "course", inputType: "radio", inputClass: "form-check-input", inputValue: "Backend", checked: null, disabled: "disabled");
$newForm->formLabel(labelID: "backend", labelClass: "form-check-label", labelTitle: "Backend");

$newForm->formDiv(divID: "devops", divClass: "form-check-inline");
$newForm->formRadio(inputID: "devops", inputName: "course", inputType: "radio", inputClass: "form-check-input", inputValue: "devops", checked: null, disabled: "disabled");
$newForm->formLabel(labelID: "devops", labelClass: "form-check-label", labelTitle: "Devops");

/** Form File Upload: Student Image */
$newForm->formDiv(divID: "image", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "image", labelClass: "form-label", labelTitle: "Click to upload an Image:");
$newForm->formFileUpload(fileInputID: "image", fileInputName: "studentImage", acceptFileType: "image/png", fileInputClass: "form-control", multiple: null, disabled: "disabled");
if (isset($_SESSION['errors']['studentImage'])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['studentImage']);
    $newForm->fieldErrorAlert(alertClass: "text-red is-invalid", alertMsg: $alertMsg);
}

/** Form Field: Registration Date */
$newForm->formDiv(divID: "regDate", divClass: "form-group mb-3");
$newForm->formLabel(labelID: "regDate", labelClass: "form-label", labelTitle: "Registration Date:");
$newForm->formField(inputID: "regDate", inputName: "regDate", inputType: "date", inputClass: "form-control", inputPlaceholder: "Enter registration date", disabled: "disabled");
if (isset($_SESSION['errors']['regDate'])) {
    $alertMsg = sprintf("%s", $_SESSION['errors']['regDate']);
    $newForm->fieldErrorAlert(alertClass: "text-red is-invalid", alertMsg: $alertMsg);
}

unset($_SESSION['errors']);

/** Form Submit Button */
$newForm->formDiv(divID: "submitButton", divClass: "form-group mb-3");
$newForm->formButton(buttonID: "submitButton", buttonName: "submiteditUser", buttonType: "submit", buttonClass: "btn btn-sm btn-primary", buttonTitle: "Submit");

// Render Form
// echo $newForm->render();
echo $newForm;
