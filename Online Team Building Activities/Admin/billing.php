<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connect to database (replace dbname, username, password with actual credentials)
$connection = new mysqli("localhost", "root", "", "otbap");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_SESSION['user_id'];

// Retrieve user's email from the database
$sql = "SELECT username FROM user WHERE id='$user_id'";
$result = $connection->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email = $row['username'];
} else {
    $email = "Unknown";
}

$connection->close();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Team Activities</title>
  <link rel="stylesheet" href="./static/css/formatting.css">
  <link href="./static/css/main.ecbd17b9.chunk.css" rel="stylesheet">
    <style data-jss="" data-meta="MuiPaper">
        .MuiPaper-root {
            color: rgba(0, 0, 0, 0.87);
            transition: box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            background-color: #fff;
        }
        .MuiPaper-rounded {
            border-radius: 4px;
        }
        .MuiPaper-outlined {
            border: 1px solid rgba(0, 0, 0, 0.12);
        }
        .MuiPaper-elevation0 {
            box-shadow: none;
        }
        .MuiPaper-elevation1 {
            box-shadow: 0px 2px 1px -1px rgba(0,0,0,0.2),0px 1px 1px 0px rgba(0,0,0,0.14),0px 1px 3px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation2 {
            box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation3 {
            box-shadow: 0px 3px 3px -2px rgba(0,0,0,0.2),0px 3px 4px 0px rgba(0,0,0,0.14),0px 1px 8px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation4 {
            box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2),0px 4px 5px 0px rgba(0,0,0,0.14),0px 1px 10px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation5 {
            box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 5px 8px 0px rgba(0,0,0,0.14),0px 1px 14px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation6 {
            box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 6px 10px 0px rgba(0,0,0,0.14),0px 1px 18px 0px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation7 {
            box-shadow: 0px 4px 5px -2px rgba(0,0,0,0.2),0px 7px 10px 1px rgba(0,0,0,0.14),0px 2px 16px 1px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation8 {
            box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2),0px 8px 10px 1px rgba(0,0,0,0.14),0px 3px 14px 2px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation9 {
            box-shadow: 0px 5px 6px -3px rgba(0,0,0,0.2),0px 9px 12px 1px rgba(0,0,0,0.14),0px 3px 16px 2px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation10 {
            box-shadow: 0px 6px 6px -3px rgba(0,0,0,0.2),0px 10px 14px 1px rgba(0,0,0,0.14),0px 4px 18px 3px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation11 {
            box-shadow: 0px 6px 7px -4px rgba(0,0,0,0.2),0px 11px 15px 1px rgba(0,0,0,0.14),0px 4px 20px 3px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation12 {
            box-shadow: 0px 7px 8px -4px rgba(0,0,0,0.2),0px 12px 17px 2px rgba(0,0,0,0.14),0px 5px 22px 4px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation13 {
            box-shadow: 0px 7px 8px -4px rgba(0,0,0,0.2),0px 13px 19px 2px rgba(0,0,0,0.14),0px 5px 24px 4px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation14 {
            box-shadow: 0px 7px 9px -4px rgba(0,0,0,0.2),0px 14px 21px 2px rgba(0,0,0,0.14),0px 5px 26px 4px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation15 {
            box-shadow: 0px 8px 9px -5px rgba(0,0,0,0.2),0px 15px 22px 2px rgba(0,0,0,0.14),0px 6px 28px 5px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation16 {
            box-shadow: 0px 8px 10px -5px rgba(0,0,0,0.2),0px 16px 24px 2px rgba(0,0,0,0.14),0px 6px 30px 5px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation17 {
            box-shadow: 0px 8px 11px -5px rgba(0,0,0,0.2),0px 17px 26px 2px rgba(0,0,0,0.14),0px 6px 32px 5px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation18 {
            box-shadow: 0px 9px 11px -5px rgba(0,0,0,0.2),0px 18px 28px 2px rgba(0,0,0,0.14),0px 7px 34px 6px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation19 {
            box-shadow: 0px 9px 12px -6px rgba(0,0,0,0.2),0px 19px 29px 2px rgba(0,0,0,0.14),0px 7px 36px 6px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation20 {
            box-shadow: 0px 10px 13px -6px rgba(0,0,0,0.2),0px 20px 31px 3px rgba(0,0,0,0.14),0px 8px 38px 7px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation21 {
            box-shadow: 0px 10px 13px -6px rgba(0,0,0,0.2),0px 21px 33px 3px rgba(0,0,0,0.14),0px 8px 40px 7px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation22 {
            box-shadow: 0px 10px 14px -6px rgba(0,0,0,0.2),0px 22px 35px 3px rgba(0,0,0,0.14),0px 8px 42px 7px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation23 {
            box-shadow: 0px 11px 14px -7px rgba(0,0,0,0.2),0px 23px 36px 3px rgba(0,0,0,0.14),0px 9px 44px 8px rgba(0,0,0,0.12);
        }
        .MuiPaper-elevation24 {
            box-shadow: 0px 11px 15px -7px rgba(0,0,0,0.2),0px 24px 38px 3px rgba(0,0,0,0.14),0px 9px 46px 8px rgba(0,0,0,0.12);
        } </style>
    <style data-jss="" data-meta="MuiSvgIcon">
    .MuiSvgIcon-root {
    fill: currentColor;
    width: 1em;
    height: 1em;
    display: inline-block;
    font-size: 1.5rem;
    transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    flex-shrink: 0;
    user-select: none;
    }
    .MuiSvgIcon-colorPrimary {
    color: #6682fb;
    }
    .MuiSvgIcon-colorSecondary {
    color: #ab82fb;
    }
    .MuiSvgIcon-colorAction {
    color: rgba(0, 0, 0, 0.54);
    }
    .MuiSvgIcon-colorError {
    color: #fb4e4e;
    }
    .MuiSvgIcon-colorDisabled {
    color: rgba(0, 0, 0, 0.26);
    }
    .MuiSvgIcon-fontSizeInherit {
    font-size: inherit;
    }
    .MuiSvgIcon-fontSizeSmall {
    font-size: 1.25rem;
    }
    .MuiSvgIcon-fontSizeLarge {
    font-size: 2.1875rem;
    }
    </style>
    <style data-jss="" data-meta="MuiButtonBase">
    .MuiButtonBase-root {
    color: inherit;
    border: 0;
    cursor: pointer;
    margin: 0;
    display: inline-flex;
    outline: 0;
    padding: 0;
    position: relative;
    align-items: center;
    user-select: none;
    border-radius: 0;
    vertical-align: middle;
    -moz-appearance: none;
    justify-content: center;
    text-decoration: none;
    background-color: transparent;
    -webkit-appearance: none;
    -webkit-tap-highlight-color: transparent;
    }
    .MuiButtonBase-root::-moz-focus-inner {
    border-style: none;
    }
    .MuiButtonBase-root.Mui-disabled {
    cursor: default;
    pointer-events: none;
    }
    @media print {
    .MuiButtonBase-root {
        -webkit-print-color-adjust: exact;
    }
    }
    </style>
    <style data-jss="" data-meta="MuiIconButton">
    .MuiIconButton-root {
    flex: 0 0 auto;
    color: rgba(0,0,0,0.7);
    padding: 12px;
    overflow: visible;
    font-size: 1.5rem;
    text-align: center;
    transition: background-color 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    border-radius: 50%;
    }
    .MuiIconButton-root:hover {
    background-color: rgba(0, 0, 0, 0.04);
    }
    .MuiIconButton-root.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
    background-color: transparent;
    }
    @media (hover: none) {
    .MuiIconButton-root:hover {
        background-color: transparent;
    }
    }
    .MuiIconButton-edgeStart {
    margin-left: -12px;
    }
    .MuiIconButton-sizeSmall.MuiIconButton-edgeStart {
    margin-left: -3px;
    }
    .MuiIconButton-edgeEnd {
    margin-right: -12px;
    }
    .MuiIconButton-sizeSmall.MuiIconButton-edgeEnd {
    margin-right: -3px;
    }
    .MuiIconButton-colorInherit {
    color: inherit;
    }
    .MuiIconButton-colorPrimary {
    color: #6682fb;
    }
    .MuiIconButton-colorPrimary:hover {
    background-color: rgba(102, 130, 251, 0.04);
    }
    @media (hover: none) {
    .MuiIconButton-colorPrimary:hover {
        background-color: transparent;
    }
    }
    .MuiIconButton-colorSecondary {
    color: #ab82fb;
    }
    .MuiIconButton-colorSecondary:hover {
    background-color: rgba(171, 130, 251, 0.04);
    }
    @media (hover: none) {
    .MuiIconButton-colorSecondary:hover {
        background-color: transparent;
    }
    }
    .MuiIconButton-sizeSmall {
    padding: 3px;
    font-size: 1.125rem;
    }
    .MuiIconButton-label {
    width: 100%;
    display: flex;
    align-items: inherit;
    justify-content: inherit;
    }

    </style><style data-jss="" data-meta="MuiButton">
    .MuiButton-root {
    color: rgba(0, 0, 0, 0.87);
    padding: 6px 16px;
    font-size: 13px;
    min-width: 64px;
    box-sizing: border-box;
    transition: background-color 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,box-shadow 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,border 250ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.75;
    border-radius: 4px;
    letter-spacing: 0.2px;
    text-transform: none;
    }
    .MuiButton-root:hover {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.04);
    }
    .MuiButton-root.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
    }
    @media (hover: none) {
    .MuiButton-root:hover {
        background-color: transparent;
    }
    }
    .MuiButton-root:hover.Mui-disabled {
    background-color: transparent;
    }
    .MuiButton-label {
    width: 100%;
    display: inherit;
    align-items: inherit;
    justify-content: inherit;
    }
    .MuiButton-text {
    padding: 6px 8px;
    }
    .MuiButton-textPrimary {
    color: #6682fb;
    }
    .MuiButton-textPrimary:hover {
    background-color: rgba(102, 130, 251, 0.04);
    }
    @media (hover: none) {
    .MuiButton-textPrimary:hover {
        background-color: transparent;
    }
    }
    .MuiButton-textSecondary {
    color: #ab82fb;
    }
    .MuiButton-textSecondary:hover {
    background-color: rgba(171, 130, 251, 0.04);
    }
    @media (hover: none) {
    .MuiButton-textSecondary:hover {
        background-color: transparent;
    }
    }
    .MuiButton-outlined {
    border: 1px solid rgba(0, 0, 0, 0.23);
    padding: 5px 15px;
    }
    .MuiButton-outlined.Mui-disabled {
    border: 1px solid rgba(0, 0, 0, 0.12);
    }
    .MuiButton-outlinedPrimary {
    color: #6682fb;
    border: 1px solid rgba(102, 130, 251, 0.5);
    }
    .MuiButton-outlinedPrimary:hover {
    border: 1px solid #6682fb;
    background-color: rgba(102, 130, 251, 0.04);
    }
    @media (hover: none) {
    .MuiButton-outlinedPrimary:hover {
        background-color: transparent;
    }
    }
    .MuiButton-outlinedSecondary {
    color: #ab82fb;
    border: 1px solid rgba(171, 130, 251, 0.5);
    }
    .MuiButton-outlinedSecondary:hover {
    border: 1px solid #ab82fb;
    background-color: rgba(171, 130, 251, 0.04);
    }
    .MuiButton-outlinedSecondary.Mui-disabled {
    border: 1px solid rgba(0, 0, 0, 0.26);
    }
    @media (hover: none) {
    .MuiButton-outlinedSecondary:hover {
        background-color: transparent;
    }
    }
    .MuiButton-contained {
    color: rgba(0, 0, 0, 0.87);
    box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
    background-color: #e0e0e0;
    }
    .MuiButton-contained:hover {
    box-shadow: 0px 2px 4px -1px rgba(0,0,0,0.2),0px 4px 5px 0px rgba(0,0,0,0.14),0px 1px 10px 0px rgba(0,0,0,0.12);
    background-color: #d5d5d5;
    }
    .MuiButton-contained.Mui-focusVisible {
    box-shadow: 0px 3px 5px -1px rgba(0,0,0,0.2),0px 6px 10px 0px rgba(0,0,0,0.14),0px 1px 18px 0px rgba(0,0,0,0.12);
    }
    .MuiButton-contained:active {
    box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2),0px 8px 10px 1px rgba(0,0,0,0.14),0px 3px 14px 2px rgba(0,0,0,0.12);
    }
    .MuiButton-contained.Mui-disabled {
    color: rgba(0, 0, 0, 0.26);
    box-shadow: none;
    background-color: rgba(0, 0, 0, 0.12);
    }
    @media (hover: none) {
    .MuiButton-contained:hover {
        box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2),0px 2px 2px 0px rgba(0,0,0,0.14),0px 1px 5px 0px rgba(0,0,0,0.12);
        background-color: #e0e0e0;
    }
    }
    .MuiButton-contained:hover.Mui-disabled {
    background-color: rgba(0, 0, 0, 0.12);
    }
    .MuiButton-containedPrimary {
    color: #fff;
    background-color: #6682fb;
    }
    .MuiButton-containedPrimary:hover {
    background-color: rgb(71, 91, 175);
    }
    @media (hover: none) {
    .MuiButton-containedPrimary:hover {
        background-color: #6682fb;
    }
    }
    .MuiButton-containedSecondary {
    color: #e3efff;
    background-color: #ab82fb;
    }
    .MuiButton-containedSecondary:hover {
    background-color: rgb(119, 91, 175);
    }
    @media (hover: none) {
    .MuiButton-containedSecondary:hover {
        background-color: #ab82fb;
    }
    }
    .MuiButton-disableElevation {
    box-shadow: none;
    }
    .MuiButton-disableElevation:hover {
    box-shadow: none;
    }
    .MuiButton-disableElevation.Mui-focusVisible {
    box-shadow: none;
    }
    .MuiButton-disableElevation:active {
    box-shadow: none;
    }
    .MuiButton-disableElevation.Mui-disabled {
    box-shadow: none;
    }
    .MuiButton-colorInherit {
    color: inherit;
    border-color: currentColor;
    }
    .MuiButton-textSizeSmall {
    padding: 4px 5px;
    font-size: 0.8125rem;
    }
    .MuiButton-textSizeLarge {
    padding: 8px 11px;
    font-size: 0.9375rem;
    }
    .MuiButton-outlinedSizeSmall {
    padding: 3px 9px;
    font-size: 0.8125rem;
    }
    .MuiButton-outlinedSizeLarge {
    padding: 7px 21px;
    font-size: 0.9375rem;
    }
    .MuiButton-containedSizeSmall {
    padding: 4px 10px;
    font-size: 0.8125rem;
    }
    .MuiButton-containedSizeLarge {
    padding: 8px 22px;
    font-size: 0.9375rem;
    }
    .MuiButton-fullWidth {
    width: 100%;
    }
    .MuiButton-startIcon {
    display: inherit;
    margin-left: -4px;
    margin-right: 8px;
    }
    .MuiButton-startIcon.MuiButton-iconSizeSmall {
    margin-left: -2px;
    }
    .MuiButton-endIcon {
    display: inherit;
    margin-left: 8px;
    margin-right: -4px;
    }
    .MuiButton-endIcon.MuiButton-iconSizeSmall {
    margin-right: -2px;
    }
    .MuiButton-iconSizeSmall > *:first-child {
    font-size: 18px;
    }
    .MuiButton-iconSizeMedium > *:first-child {
    font-size: 20px;
    }
    .MuiButton-iconSizeLarge > *:first-child {
    font-size: 22px;
    }
    </style><style data-jss="" data-meta="MuiDialog">
    @media print {
    .MuiDialog-root {
        position: absolute !important;
    }
    }
    .MuiDialog-scrollPaper {
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .MuiDialog-scrollBody {
    overflow-x: hidden;
    overflow-y: auto;
    text-align: center;
    }
    .MuiDialog-scrollBody:after {
    width: 0;
    height: 100%;
    content: "";
    display: inline-block;
    vertical-align: middle;
    }
    .MuiDialog-container {
    height: 100%;
    outline: 0;
    }
    @media print {
    .MuiDialog-container {
        height: auto;
    }
    }
    .MuiDialog-paper {
    margin: 32px;
    padding: 10px;
    position: relative;
    overflow-y: auto;
    border-radius: 8px;
    }
    @media print {
    .MuiDialog-paper {
        box-shadow: none;
        overflow-y: visible;
    }
    }
    .MuiDialog-paperScrollPaper {
    display: flex;
    max-height: calc(100% - 64px);
    flex-direction: column;
    }
    .MuiDialog-paperScrollBody {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    }
    .MuiDialog-paperWidthFalse {
    max-width: calc(100% - 64px);
    }
    .MuiDialog-paperWidthXs {
    max-width: 444px;
    }
    @media (max-width:507.95px) {
    .MuiDialog-paperWidthXs.MuiDialog-paperScrollBody {
        max-width: calc(100% - 64px);
    }
    }
    .MuiDialog-paperWidthSm {
    max-width: 600px;
    }
    @media (max-width:663.95px) {
    .MuiDialog-paperWidthSm.MuiDialog-paperScrollBody {
        max-width: calc(100% - 64px);
    }
    }
    .MuiDialog-paperWidthMd {
    max-width: 960px;
    }
    @media (max-width:1023.95px) {
    .MuiDialog-paperWidthMd.MuiDialog-paperScrollBody {
        max-width: calc(100% - 64px);
    }
    }
    .MuiDialog-paperWidthLg {
    max-width: 1280px;
    }
    @media (max-width:1343.95px) {
    .MuiDialog-paperWidthLg.MuiDialog-paperScrollBody {
        max-width: calc(100% - 64px);
    }
    }
    .MuiDialog-paperWidthXl {
    max-width: 1920px;
    }
    @media (max-width:1983.95px) {
    .MuiDialog-paperWidthXl.MuiDialog-paperScrollBody {
        max-width: calc(100% - 64px);
    }
    }
    .MuiDialog-paperFullWidth {
    width: calc(100% - 64px);
    }
    .MuiDialog-paperFullScreen {
    width: 100%;
    height: 100%;
    margin: 0;
    max-width: 100%;
    max-height: none;
    border-radius: 0;
    }
    .MuiDialog-paperFullScreen.MuiDialog-paperScrollBody {
    margin: 0;
    max-width: 100%;
    }
    </style><style data-jss="" data-meta="MuiTypography">
    .MuiTypography-root {
    margin: 0;
    }
    .MuiTypography-body2 {
    font-size: 13px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.69;
    letter-spacing: 0.1px;
    }
    .MuiTypography-body1 {
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.5;
    letter-spacing: 0.1px;
    }
    .MuiTypography-caption {
    font-size: 12px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.33;
    letter-spacing: 0.4px;
    }
    .MuiTypography-button {
    font-size: 13px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.75;
    letter-spacing: 0.2px;
    text-transform: capitalize;
    }
    .MuiTypography-h1 {
    font-size: 58px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 300;
    line-height: 1.17;
    letter-spacing: -1.5px;
    }
    .MuiTypography-h2 {
    font-size: 46px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 300;
    line-height: 1.2;
    letter-spacing: -0.00833em;
    letter-wpacing: -0.5px;
    }
    .MuiTypography-h3 {
    font-size: 33px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.25;
    letter-spacing: 0.2px;
    }
    .MuiTypography-h4 {
    font-size: 23px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.23;
    letter-spacing: 0.2px;
    }
    .MuiTypography-h5 {
    font-size: 19px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.2;
    letter-spacing: 0.2px;
    }
    .MuiTypography-h6 {
    font-size: 16px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.33;
    letter-spacing: 0.2px;
    }
    .MuiTypography-subtitle1 {
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.5;
    letter-spacing: 0.2px;
    }
    .MuiTypography-subtitle2 {
    font-size: 13px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.29;
    letter-spacing: 0.1px;
    }
    .MuiTypography-overline {
    font-size: 10px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.6;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    }
    .MuiTypography-srOnly {
    width: 1px;
    height: 1px;
    overflow: hidden;
    position: absolute;
    }
    .MuiTypography-alignLeft {
    text-align: left;
    }
    .MuiTypography-alignCenter {
    text-align: center;
    }
    .MuiTypography-alignRight {
    text-align: right;
    }
    .MuiTypography-alignJustify {
    text-align: justify;
    }
    .MuiTypography-noWrap {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    .MuiTypography-gutterBottom {
    margin-bottom: 0.35em;
    }
    .MuiTypography-paragraph {
    margin-bottom: 16px;
    }
    .MuiTypography-colorInherit {
    color: inherit;
    }
    .MuiTypography-colorPrimary {
    color: #6682fb;
    }
    .MuiTypography-colorSecondary {
    color: #ab82fb;
    }
    .MuiTypography-colorTextPrimary {
    color: rgba(0, 0, 0, 0.87);
    }
    .MuiTypography-colorTextSecondary {
    color: rgba(0, 0, 0, 0.54);
    }
    .MuiTypography-colorError {
    color: #fb4e4e;
    }
    .MuiTypography-displayInline {
    display: inline;
    }
    .MuiTypography-displayBlock {
    display: block;
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss23 {
    gap: 8px;
    border: 1px solid #C4C4C4;
    display: flex;
    padding: 20px 12px;
    align-items: center;
    border-radius: 4px;
    flex-direction: column;
    }
    .jss24 {
    gap: 16px;
    display: flex;
    max-width: 55%;
    align-items: center;
    justify-content: center;
    }
    @media (max-width:959.95px) {
    .jss24 {
        max-width: 100%;
        flex-direction: column;
    }
    }
    .jss25 {
    gap: 16px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    }
    @media (max-width:959.95px) {
    .jss25 > *:first-child {
        margin-top: 32px;
    }
    }
    .jss26 {
    color: #747474;
    }
    .jss27 {
    gap: 8px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    }
    .jss28 {
    top: 8px;
    right: 8px;
    position: absolute;
    }
    </style><style data-jss="" data-meta="PrivateHiddenCss">
    @media (min-width:0px) and (max-width:599.95px) {
    .jss8 {
        display: none;
    }
    }
    @media (min-width:0px) {
    .jss9 {
        display: none;
    }
    }
    @media (max-width:599.95px) {
    .jss10 {
        display: none;
    }
    }
    @media (min-width:600px) and (max-width:959.95px) {
    .jss11 {
        display: none;
    }
    }
    @media (min-width:600px) {
    .jss12 {
        display: none;
    }
    }
    @media (max-width:959.95px) {
    .jss13 {
        display: none;
    }
    }
    @media (min-width:960px) and (max-width:1279.95px) {
    .jss14 {
        display: none;
    }
    }
    @media (min-width:960px) {
    .jss15 {
        display: none;
    }
    }
    @media (max-width:1279.95px) {
    .jss16 {
        display: none;
    }
    }
    @media (min-width:1280px) and (max-width:1919.95px) {
    .jss17 {
        display: none;
    }
    }
    @media (min-width:1280px) {
    .jss18 {
        display: none;
    }
    }
    @media (max-width:1919.95px) {
    .jss19 {
        display: none;
    }
    }
    @media (min-width:1920px) {
    .jss20 {
        display: none;
    }
    }
    @media (min-width:1920px) {
    .jss21 {
        display: none;
    }
    }
    @media (min-width:0px) {
    .jss22 {
        display: none;
    }
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss1 {
    width: 250px!important;
    border: 1px solid #d6d6d6;
    height: calc(100vh - 150px)!important;
    padding: 20px;
    box-shadow: 1px 1px 12px -3px #c3c3c3;
    margin-top: 100px;
    border-radius: 12px 0px 0px 12px;
    backdrop-filter: saturate(180%)blur(52px);
    background-color: rgb(255 255 255 / 90%);
    -o-backdrop-filter: saturate(180%)blur(52px);
    -ms-backdrop-filter: saturate(180%)blur(52px);
    -webkit-backdrop-filter: saturate(180%)blur(52px);
    }
    @media (max-width:719.95px) {
    .jss1 {
        left: 10px;
        width: calc(100% - 65px)!important;
        height: calc(100vh - 140px)!important;
        border-radius: 12px 12px 0px 0px;
    }
    }
    @media (min-width:1728px) {
    .jss1 {
        width: 300px!important;
    }
    }
    .jss2 {
    height: -webkit-fill-available;
    overflow-y: scroll;
    margin-left: 12px;
    margin-right: 12px;
    }
    .jss3 {
    color: black;
    padding: 10px 12px;
    background: #f0f3ff;
    border-radius: 14px;
    }
    .jss4 {
    padding: 10px;
    max-width: 200px;
    background: #E6F4EA;
    border-radius: 10px;
    }
    .jss5 {
    color: white;
    cursor: pointer;
    padding: 7px 6px 6px 9px;
    background: #6682fb;
    border-radius: 8px;
    }
    .jss5:hover {
    background: rgb(71 91 175);
    }
    .jss5:active {
    box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);
    }
    .jss5.disabled {
    opacity: 0.7;
    background: #6682fb;
    box-shadow: none;
    }
    .jss6 {
    margin: 12px !important;
    margin-top: 0px !important;
    }
    .jss6 .MuiInput-root {
    padding: 8px;
    }
    .jss7 {
    font-weight: 600;
    margin-right: 6px;
    }
    </style><style data-jss="" data-meta="MuiAvatar">
    .MuiAvatar-root {
    width: 40px;
    height: 40px;
    display: flex;
    overflow: hidden;
    position: relative;
    font-size: 1.25rem;
    align-items: center;
    flex-shrink: 0;
    font-family: "Roboto", "Helvetica", "Arial", sans-serif;
    line-height: 1;
    user-select: none;
    border-radius: 50%;
    justify-content: center;
    }
    .MuiAvatar-colorDefault {
    color: #fafafa;
    background-color: #5E5E5E;
    }
    .MuiAvatar-rounded {
    border-radius: 4px;
    }
    .MuiAvatar-square {
    border-radius: 0;
    }
    .MuiAvatar-img {
    color: transparent;
    width: 100%;
    height: 100%;
    object-fit: cover;
    text-align: center;
    text-indent: 10000px;
    }
    .MuiAvatar-fallback {
    width: 75%;
    height: 75%;
    }
    </style><style data-jss="" data-meta="MuiPopover">
    .MuiPopover-paper {
    outline: 0;
    position: absolute;
    max-width: calc(100% - 32px);
    min-width: 16px;
    max-height: calc(100% - 32px);
    min-height: 16px;
    overflow-x: hidden;
    overflow-y: auto;
    }
    </style><style data-jss="" data-meta="MuiList">
    .MuiList-root {
    margin: 0;
    padding: 0;
    position: relative;
    list-style: none;
    }
    .MuiList-padding {
    padding-top: 8px;
    padding-bottom: 8px;
    }
    .MuiList-subheader {
    padding-top: 0;
    }
    </style><style data-jss="" data-meta="MuiMenu">
    .MuiMenu-paper {
    max-height: calc(100% - 96px);
    -webkit-overflow-scrolling: touch;
    }
    .MuiMenu-list {
    outline: 0;
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss29 {
    cursor: pointer;
    display: flex;
    align-items: center;
    flex-direction: column;
    }
    .jss30 {
    transition: transform 0.15s ease;
    }
    .jss30.selected {
    transform: scale(1.08);
    }
    @media (min-width:600px) {
    .jss30 {
        width: 100%;
        height: 100%;
    }
    }
    .jss31 {
    font-size: 14px;
    font-weight: 500;
    }
    .jss32 {
    color: #484747;
    padding: 4px 8px;
    background: #F1F1F1;
    border-radius: 4px;
    }
    .jss32 .MuiChip-label {
    padding: 0px !important;
    }
    .jss32:focus {
    background-color: #F1F1F1;
    }
    .jss32.selected {
    border: solid 1px #6682fb;
    background-color: #7B92F852;
    }
    .jss32.selected:focus {
    background-color: #7B92F852;
    }
    .jss33 {
    margin-top: 8px;
    }
    .jss33 .MuiFilledInput-root {
    background-color: #F1F1F1 !important;
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss35 {
    top: 24px;
    color: #FFFFFF;
    right: 24px;
    position: absolute;
    }
    @media (max-width:959.95px) {
    .jss35 {
        top: 12px;
        right: 12px;
    }
    }
    @media (max-width:599.95px) {
    .jss35 {
        top: 4px;
        right: 4px;
    }
    }
    .jss36 {
    width: min(80vw, 520px);
    }
    </style><style data-jss="" data-meta="MuiAppBar">
    .MuiAppBar-root {
    width: 100%;
    display: flex;
    z-index: 1100;
    box-sizing: border-box;
    flex-shrink: 0;
    flex-direction: column;
    }
    .MuiAppBar-positionFixed {
    top: 0;
    left: auto;
    right: 0;
    position: fixed;
    }
    @media print {
    .MuiAppBar-positionFixed {
        position: absolute;
    }
    }
    .MuiAppBar-positionAbsolute {
    top: 0;
    left: auto;
    right: 0;
    position: absolute;
    }
    .MuiAppBar-positionSticky {
    top: 0;
    left: auto;
    right: 0;
    position: sticky;
    }
    .MuiAppBar-positionStatic {
    position: static;
    }
    .MuiAppBar-positionRelative {
    position: relative;
    }
    .MuiAppBar-colorDefault {
    color: rgba(0, 0, 0, 0.87);
    background-color: #f5f5f5;
    }
    .MuiAppBar-colorPrimary {
    color: #fff;
    background-color: #6682fb;
    }
    .MuiAppBar-colorSecondary {
    color: #e3efff;
    background-color: #ab82fb;
    }
    .MuiAppBar-colorInherit {
    color: inherit;
    }
    .MuiAppBar-colorTransparent {
    color: inherit;
    background-color: transparent;
    }
    </style><style data-jss="" data-meta="MuiDrawer">
    .MuiDrawer-docked {
    flex: 0 0 auto;
    }
    .MuiDrawer-paper {
    top: 0;
    flex: 1 0 auto;
    height: 100%;
    display: flex;
    outline: 0;
    z-index: 1200;
    position: fixed;
    overflow-y: auto;
    flex-direction: column;
    -webkit-overflow-scrolling: touch;
    }
    .MuiDrawer-paperAnchorLeft {
    left: 0;
    right: auto;
    }
    .MuiDrawer-paperAnchorRight {
    left: auto;
    right: 0;
    }
    .MuiDrawer-paperAnchorTop {
    top: 0;
    left: 0;
    right: 0;
    bottom: auto;
    height: auto;
    max-height: 100%;
    }
    .MuiDrawer-paperAnchorBottom {
    top: auto;
    left: 0;
    right: 0;
    bottom: 0;
    height: auto;
    max-height: 100%;
    }
    .MuiDrawer-paperAnchorDockedLeft {
    border-right: 1px solid rgba(0, 0, 0, 0.12);
    }
    .MuiDrawer-paperAnchorDockedTop {
    border-bottom: 1px solid rgba(0, 0, 0, 0.12);
    }
    .MuiDrawer-paperAnchorDockedRight {
    border-left: 1px solid rgba(0, 0, 0, 0.12);
    }
    .MuiDrawer-paperAnchorDockedBottom {
    border-top: 1px solid rgba(0, 0, 0, 0.12);
    }
    </style><style data-jss="" data-meta="MuiListItem">
    .MuiListItem-root {
    width: -webkit-fill-available;
    border: 1px solid transparent;
    margin: 8px 8px 8px 8px;
    display: flex;
    padding: 2px;
    position: relative;
    box-sizing: border-box;
    text-align: left;
    align-items: center;
    padding-top: 8px;
    border-radius: 25px;
    padding-bottom: 8px;
    justify-content: flex-start;
    text-decoration: none;
    }
    .MuiListItem-root.Mui-focusVisible {
    background-color: rgba(0, 0, 0, 0.08);
    }
    .MuiListItem-root.Mui-selected, .MuiListItem-root.Mui-selected:hover {
    background-color: rgba(0, 0, 0, 0.08);
    }
    .MuiListItem-root.Mui-disabled {
    opacity: 0.5;
    }
    .MuiListItem-container {
    position: relative;
    }
    .MuiListItem-dense {
    padding-top: 4px;
    padding-bottom: 4px;
    }
    .MuiListItem-alignItemsFlexStart {
    align-items: flex-start;
    }
    .MuiListItem-divider {
    border-bottom: 1px solid rgba(0, 0, 0, 0.12);
    background-clip: padding-box;
    }
    .MuiListItem-gutters {
    padding-left: 16px;
    padding-right: 16px;
    }
    .MuiListItem-button {
    transition: background-color 150ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    }
    .MuiListItem-button:hover {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.04);
    }
    @media (hover: none) {
    .MuiListItem-button:hover {
        background-color: transparent;
    }
    }
    .MuiListItem-secondaryAction {
    padding-right: 48px;
    }
    </style><style data-jss="" data-meta="MuiListItemIcon">
    .MuiListItemIcon-root {
    color: rgba(0, 0, 0, 0.54);
    display: inline-flex;
    min-width: 32px;
    flex-shrink: 0;
    }
    .MuiListItemIcon-alignItemsFlexStart {
    margin-top: 8px;
    }
    </style><style data-jss="" data-meta="MuiListItemText">
    .MuiListItemText-root {
    flex: 1 1 auto;
    min-width: 0;
    margin-top: 4px;
    margin-bottom: 4px;
    }
    .MuiListItemText-multiline {
    margin-top: 6px;
    margin-bottom: 6px;
    }
    .MuiListItemText-inset {
    padding-left: 56px;
    }
    </style><style data-jss="" data-meta="MuiToolbar">
    .MuiToolbar-root {
    display: flex;
    position: relative;
    align-items: center;
    }
    .MuiToolbar-gutters {
    padding-left: 16px;
    padding-right: 16px;
    }
    @media (min-width:600px) {
    .MuiToolbar-gutters {
        padding-left: 24px;
        padding-right: 24px;
    }
    }
    .MuiToolbar-regular {
    min-height: 56px;
    }
    @media (min-width:0px) and (orientation: landscape) {
    .MuiToolbar-regular {
        min-height: 48px;
    }
    }
    @media (min-width:600px) {
    .MuiToolbar-regular {
        min-height: 64px;
    }
    }
    .MuiToolbar-dense {
    min-height: 48px;
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss37 {
    flex-grow: 1;
    align-items: center;
    }
    .jss38 {
    color: white;
    font-size: 10px;
    margin-left: 4px;
    padding-top: 2px;
    padding-left: 4px;
    border-radius: 4px;
    padding-right: 4px;
    padding-bottom: 2px;
    background-color: #6682fb;
    }
    @media (min-width:600px) {
    .jss39 {
        width: 240px;
        flex-shrink: 0;
    }
    }
    .jss40 {
    height: 100%;
    background: linear-gradient(358.88deg, rgba(212, 170, 255, 0.71) 0.96%, rgba(255, 179, 237, 0.6) 42.34%, rgba(255, 208, 189, 0.5) 80.14%, rgba(255, 238, 201, 0.5) 99.04%);
    flex-direction: column;
    }
    .jss40 .MuiTypography-body1 {
    font-weight: 500;
    }
    .jss41 {
    backdrop-filter: saturate(180%)blur(12px);
    background-color: rgb(255 255 255);
    -o-backdrop-filter: saturate(180%)blur(12px);
    -ms-backdrop-filter: saturate(180%)blur(12px);
    -webkit-backdrop-filter: saturate(180%)blur(12px);
    }
    @media (min-width:600px) {
    .jss41 {
        width: calc(100% - 240px);
        margin-left: 242px;
    }
    }
    .jss42 {
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    .jss43 {
    margin-right: 16px;
    }
    @media (min-width:600px) {
    .jss43 {
        display: none;
    }
    }
    .jss44 {
    min-height: 56px;
    }
    @media (min-width:0px) and (orientation: landscape) {
    .jss44 {
        min-height: 48px;
    }
    }
    @media (min-width:600px) {
    .jss44 {
        min-height: 64px;
    }
    }
    .jss45 {
    width: 242px;
    }
    .jss46 {
    padding: 24px;
    }
    @media (min-width:600px) {
    .jss46 {
        margin-left: 242px;
    }
    }
    .jss47 {
    cursor: pointer;
    padding: 12px;
    align-items: center;
    border-bottom: 1px solid #e0e0e0;
    }
    .jss47:hover {
    background-color: #e1e4e5;
    }
    .jss48 {
    margin-right: 10px;
    }
    .jss49 {
    color: rgba(0, 0, 0, 0.87);
    overflow: hidden;
    line-height: 1.2;
    margin-bottom: 3px;
    text-overflow: ellipsis;
    }
    .jss50 {
    color: rgba(0, 0, 0, 0.54);
    overflow: hidden;
    font-size: 13px;
    text-overflow: ellipsis;
    text-transform: capitalize;
    }
    .jss51 {
    color: #6682fb;
    cursor: pointer;
    padding: 4px 16px;
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.5;
    letter-spacing: 0.1px;
    }
    .jss51 .MuiListItemIcon-root {
    color: #6682fb;
    }
    .jss51.jss52, .jss51.jss52:hover {
    color: white;
    background-color: #6682fb;
    }
    .jss51:hover:not(.Mui-disabled) {
    color: white;
    background-color: #8399fc;
    }
    .jss51:hover:not(.Mui-disabled) .MuiListItemIcon-root {
    color: white;
    }
    .jss51.jss52 .MuiListItemIcon-root, .jss51.jss52:hover .MuiListItemIcon-root {
    color: white;
    }
    .jss53 {
    display: flex;
    padding: 4px 12px;
    background: linear-gradient(90deg, rgba(212, 170, 255, 0.71) 0.96%, rgba(255, 179, 237, 0.6) 42.34%, rgba(255, 208, 189, 0.5) 80.14%, rgba(255, 238, 201, 0.5) 99.04%);
    align-items: center;
    margin-left: auto;
    border-radius: 4px;
    }
    .jss54 {
    display: -webkit-box;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    }
    </style><style data-jss="" data-meta="MuiTableRow">
        .MuiTableRow-root {
        color: inherit;
        display: table-row;
        outline: 0;
        vertical-align: middle;
        }
        .MuiTableRow-root.MuiTableRow-hover:hover {
        background-color: rgba(0, 0, 0, 0.04);
        }
        .MuiTableRow-root.Mui-selected, .MuiTableRow-root.Mui-selected:hover {
        background-color: rgba(171, 130, 251, 0.08);
        }
        </style><style data-jss="" data-meta="MuiTableCell">
        .MuiTableCell-root {
        display: table-cell;
        padding: 16px;
        font-size: 13px;
        text-align: left;
        font-family: Poppins, Helvetica, Arial, sans-serif;
        font-weight: normal;
        line-height: 1.69;
        border-bottom: 1px solid
            rgba(224, 224, 224, 1);
        letter-spacing: 0.1px;
        vertical-align: inherit;
        }
        .MuiTableCell-head {
        color: rgba(0, 0, 0, 0.87);
        font-weight: 500;
        line-height: 1.5rem;
        }
        .MuiTableCell-body {
        color: rgba(0, 0, 0, 0.87);
        }
        .MuiTableCell-footer {
        color: rgba(0, 0, 0, 0.54);
        font-size: 0.75rem;
        line-height: 1.3125rem;
        }
        .MuiTableCell-sizeSmall {
        padding: 6px 24px 6px 16px;
        }
        .MuiTableCell-sizeSmall:last-child {
        padding-right: 16px;
        }
        .MuiTableCell-sizeSmall.MuiTableCell-paddingCheckbox {
        width: 24px;
        padding: 0 12px 0 16px;
        }
        .MuiTableCell-sizeSmall.MuiTableCell-paddingCheckbox:last-child {
        padding-left: 12px;
        padding-right: 16px;
        }
        .MuiTableCell-sizeSmall.MuiTableCell-paddingCheckbox > * {
        padding: 0;
        }
        .MuiTableCell-paddingCheckbox {
        width: 48px;
        padding: 0 0 0 4px;
        }
        .MuiTableCell-paddingCheckbox:last-child {
        padding-left: 0;
        padding-right: 4px;
        }
        .MuiTableCell-paddingNone {
        padding: 0;
        }
        .MuiTableCell-paddingNone:last-child {
        padding: 0;
        }
        .MuiTableCell-alignLeft {
        text-align: left;
        }
        .MuiTableCell-alignCenter {
        text-align: center;
        }
        .MuiTableCell-alignRight {
        text-align: right;
        flex-direction: row-reverse;
        }
        .MuiTableCell-alignJustify {
        text-align: justify;
        }
        .MuiTableCell-stickyHeader {
        top: 0;
        left: 0;
        z-index: 2;
        position: sticky;
        background-color: #fafafa;
        }
        </style><style data-jss="" data-meta="MuiTableContainer">
        .MuiTableContainer-root {
        width: 100%;
        overflow-x: auto;
        }
        </style><style data-jss="" data-meta="MuiTable">
        .MuiTable-root {
        width: 100%;
        display: table;
        border-spacing: 0;
        border-collapse: collapse;
        }
        .MuiTable-root caption {
        color: rgba(0, 0, 0, 0.54);
        padding: 16px;
        font-size: 13px;
        text-align: left;
        font-family: Poppins, Helvetica, Arial, sans-serif;
        font-weight: normal;
        line-height: 1.69;
        caption-side: bottom;
        letter-spacing: 0.1px;
        }
        .MuiTable-stickyHeader {
        border-collapse: separate;
        }
        </style><style data-jss="" data-meta="MuiTableBody">
        .MuiTableBody-root {
        display: table-row-group;
        }
        </style><style data-jss="" data-meta="MuiTableHead">
    .jss246 {
    width: 100%;
    bottom: 0;
    height: 2px;
    position: absolute;
    transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    }
    .jss247 {
    background-color: #6682fb;
    }
    .jss248 {
    background-color: #ab82fb;
    }
    .jss249 {
    right: 0;
    width: 2px;
    height: 100%;
    }
    </style><style data-jss="" data-meta="MuiTabScrollButton">
    .MuiTabScrollButton-root {
    width: 40px;
    opacity: 0.8;
    flex-shrink: 0;
    }
    .MuiTabScrollButton-root.Mui-disabled {
    opacity: 0;
    }
    .MuiTabScrollButton-vertical {
    width: 100%;
    height: 40px;
    }
    .MuiTabScrollButton-vertical svg {
    transform: rotate(90deg);
    }
    </style><style data-jss="" data-meta="MuiTabs">
    .MuiTabs-root {
    display: flex;
    overflow: hidden;
    min-height: 48px;
    -webkit-overflow-scrolling: touch;
    }
    .MuiTabs-vertical {
    flex-direction: column;
    }
    .MuiTabs-flexContainer {
    display: flex;
    }
    .MuiTabs-flexContainerVertical {
    flex-direction: column;
    }
    .MuiTabs-centered {
    justify-content: center;
    }
    .MuiTabs-scroller {
    flex: 1 1 auto;
    display: inline-block;
    position: relative;
    white-space: nowrap;
    }
    .MuiTabs-fixed {
    width: 100%;
    overflow-x: hidden;
    }
    .MuiTabs-scrollable {
    overflow-x: scroll;
    scrollbar-width: none;
    }
    .MuiTabs-scrollable::-webkit-scrollbar {
    display: none;
    }
    @media (max-width:599.95px) {
    .MuiTabs-scrollButtonsDesktop {
        display: none;
    }
    }
    </style><style data-jss="" data-meta="MuiTab">
    .MuiTab-root {
    padding: 6px 12px;
    overflow: hidden;
    position: relative;
    font-size: 13px;
    max-width: 264px;
    min-width: 72px;
    box-sizing: border-box;
    min-height: 48px;
    text-align: center;
    flex-shrink: 0;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.75;
    white-space: normal;
    letter-spacing: 0.2px;
    text-transform: capitalize;
    }
    @media (min-width:600px) {
    .MuiTab-root {
        min-width: 160px;
    }
    }
    .MuiTab-labelIcon {
    min-height: 72px;
    padding-top: 9px;
    }
    .MuiTab-labelIcon .MuiTab-wrapper > *:first-child {
    margin-bottom: 6px;
    }
    .MuiTab-textColorInherit {
    color: inherit;
    opacity: 0.7;
    }
    .MuiTab-textColorInherit.Mui-selected {
    opacity: 1;
    }
    .MuiTab-textColorInherit.Mui-disabled {
    opacity: 0.5;
    }
    .MuiTab-textColorPrimary {
    color: rgba(0, 0, 0, 0.54);
    }
    .MuiTab-textColorPrimary.Mui-selected {
    color: #6682fb;
    }
    .MuiTab-textColorPrimary.Mui-disabled {
    color: rgba(0, 0, 0, 0.38);
    }
    .MuiTab-textColorSecondary {
    color: rgba(0, 0, 0, 0.54);
    }
    .MuiTab-textColorSecondary.Mui-selected {
    color: #ab82fb;
    }
    .MuiTab-textColorSecondary.Mui-disabled {
    color: rgba(0, 0, 0, 0.38);
    }
    .MuiTab-fullWidth {
    flex-grow: 1;
    max-width: none;
    flex-basis: 0;
    flex-shrink: 1;
    }
    .MuiTab-wrapped {
    font-size: 0.75rem;
    line-height: 1.5;
    }
    .MuiTab-wrapper {
    width: 100%;
    display: inline-flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss242 {
    margin-top: -20px;
    margin-bottom: 20px;
    }
    .jss243 {
    min-width: 25%;
    }
    @media (max-width:959.95px) {
    .jss243 {
        min-width: 33%;
    }
    }
    .jss244 {
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.5;
    letter-spacing: 0.2px;
    }
    .jss245 {
    width: 0;
    padding: 0;
    min-width: 0;
    border-left: 1px solid rgba(0, 0, 0, 0.12);
    }
    </style><style data-jss="" data-meta="makeStyles">
    .jss250 {
    padding: 16px;
    border-radius: 10px;
    }
    .jss250:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.04);
    }
    .jss251 {
    gap: 4px;
    display: flex;
    margin-top: -8px;
    align-items: center;
    padding-bottom: 12px;
    }
    .jss252 {
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.5;
    white-space: nowrap;
    letter-spacing: 0.2px;
    text-decoration: none;
    }
    @media (max-width:1279.95px) {
    .jss252 {
        font-size: 13px;
        font-family: Poppins, Helvetica, Arial, sans-serif;
        font-weight: 500;
        line-height: 1.29;
        letter-spacing: 0.1px;
    }
    }
    .jss253 {
    color: #5E5E5E;
    transition: color .5s;
    }
    .jss253:hover {
    color: #6682fb;
    }
    .jss254 {
    width: 80px;
    height: 80px;
    margin-right: 10px;
    border-radius: 8px;
    }
    .jss255 {
    color: rgba(0, 0, 0, 0.87);
    }
    .jss256 {
    color: rgba(0, 0, 0, 0.54);
    }
    .jss257 {
    flex-grow: 1;
    }
    .jss258 {
    right: 16px;
    bottom: 16px;
    z-index: 10;
    position: fixed;
    }
    .jss259 {
    padding: 16px;
    text-align: left;
    }
    .jss260 {
    height: 100%;
    }
    .jss260:hover {
    opacity: 0.5;
    }
    .jss261 {
    color: #595959;
    padding: 10px;
    margin-left: 5px;
    }
    .jss261 svg {
    font-size: 18px;
    }
    .jss262 {
    color: #6682FB;
    padding: 2px 8px;
    font-size: 10px;
    border-radius: 10px;
    background-color: #6682FB54;
    }
    .jss263 {
    gap: 20px;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    }
    @media (min-width:0px) {
    .jss263 {
        grid-template-columns: repeat(2, 1fr);
    }
    }
    @media (min-width:600px) {
    .jss263 {
        grid-template-columns: repeat(3, 1fr);
    }
    }
    @media (min-width:960px) {
    .jss263 {
        grid-template-columns: repeat(4, 1fr);
    }
    }
    @media (min-width:1280px) {
    .jss263 {
        grid-template-columns: repeat(5, 1fr);
    }
    }
    @media (min-width:1920px) {
    .jss263 {
        grid-template-columns: repeat(6, 1fr);
    }
    }
    .jss264 {
    gap: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    }
    @media (max-width: 576px) {
    .jss264 {
        grid-template-columns: repeat(1, 1fr);
    }
    }
    .jss265 .react-multiple-carousel__arrow {
    color: #6682fb;
    border: solid 1.5px#6682fb;
    opacity: 0.65;
    min-width: 24px;
    background: #FFFFFF;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    min-height: 24px;
    }
    .jss265 .react-multiple-carousel__arrow:hover {
    opacity: 1;
    background: #FFFFFF;
    }
    .jss265 .react-multiple-carousel__arrow--right {
    right: 0px !important;
    }
    .jss265 .react-multiple-carousel__arrow--left {
    left: 0px !important;
    }
    .jss265 .react-multiple-carousel__arrow::before {
    color: #6682fb;
    font-size: 12px;
    }
    .jss266 {
    gap: 8px;
    color: #6682fb;
    border: 2px dashed #6682fb;
    cursor: pointer;
    display: flex;
    padding: 16px;
    align-items: center;
    aspect-ratio: 0.77;
    border-radius: 4px;
    flex-direction: column;
    justify-content: center;
    }
    .jss266 .icon {
    font-size: 28px;
    transition: font-size 0.15s;
    transition-timing-function: ease-in-out;
    }
    .jss266 .text {
    transition: font-size 0.15s;
    font-weight: 600;
    transition-timing-function: ease-in-out;
    }
    .jss266:hover {
    background-color: #f2f5ff;
    }
    .jss266:hover .icon {
    font-size: 30px;
    }
    .jss266:hover .text {
    font-size: 15px;
    }
    .jss267 {
    gap: 16px;
    border: 2px solid #FD02BE;
    cursor: pointer;
    display: flex;
    padding: 12px;
    background: linear-gradient(0deg, rgba(212, 170, 255, 0.55) 0.19%, rgba(255, 178, 237, 0.55) 44.9%, rgba(255, 208, 189, 0.55) 80.77%, rgba(255, 238, 201, 0.55) 100%);
    align-items: center;
    aspect-ratio: 0.77;
    border-radius: 4px;
    flex-direction: column;
    justify-content: center;
    }
    .jss267 img {
    width: 25%;
    transition: width 0.15s;
    transition-timing-function: ease-in-out;
    }
    .jss267 .text {
    transition: font-size 0.15s;
    font-weight: 600;
    transition-timing-function: ease-in-out;
    }
    .jss267:hover .text {
    font-size: 15px;
    }
    .jss267:hover img {
    width: 27%;
    }
    .jss268 {
    pointer-events: none;
    }
    .jss269 {
    color: white;
    padding: 8px 16px;
    max-width: 90%;
    background: linear-gradient(91.99deg, #973DF4 1.34%, rgba(151, 61, 244, 0.768159) 51.96%, rgba(151, 61, 244, 0.67) 73.43%, rgba(253, 2, 190, 0.41) 106.42%, rgba(253, 2, 190, 0.4) 106.43%, rgba(253, 2, 190, 0) 106.44%);
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    text-align: center;
    border-radius: 4px;
    }
    .jss270 {
    font-weight: 600;
    padding-bottom: 8px;
    }
    .jss271 {
    position: absolute;
    }
    .jss272 {
    width: 30%;
    }
    @media (max-width:959.95px) {
    .jss272 {
        width: 70%;
    }
    }
    .jss272 .MuiOutlinedInput-input {
    padding: 14px;
    }
    .jss273 {
    color: hsla(0, 0%, 21%, 1) !important;
    padding: 0;
    font-size: 15px;
    min-width: 0;
    min-height: 36px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: 500;
    line-height: 1.1;
    letter-spacing: 0.2px;
    }
    .jss274 {
    background-color: #6682fb;
    }
    .jss275 {
    height: 36px;
    overflow-x: scroll !important;
    overflow-y: hidden !important;
    }
    </style><style data-jss="" data-meta="MuiCard">
    .MuiCard-root {
    overflow: hidden;
    }
    </style><style data-jss="" data-meta="MuiCardHeader">
    .MuiCardHeader-root {
    display: flex;
    padding: 16px;
    align-items: center;
    }
    .MuiCardHeader-avatar {
    flex: 0 0 auto;
    margin-right: 16px;
    }
    .MuiCardHeader-action {
    flex: 0 0 auto;
    align-self: flex-start;
    margin-top: -8px;
    margin-right: -8px;
    }
    .MuiCardHeader-content {
    flex: 1 1 auto;
    }
    </style><style data-jss="" data-meta="MuiCardContent">
    .MuiCardContent-root {
    padding: 16px;
    }
    .MuiCardContent-root:last-child {
    padding-bottom: 24px;
    }
    </style>
    <style data-jss="" data-meta="makeStyles">
    .jss277 {
    width: 50%;
    transform: translate(1%,5%);
    aspect-ratio: 1/1;
    }
    .jss278 {
    display: flex;
    padding: 0px;
    align-items: center;
    flex-direction: column;
    }
    .jss279 {
    margin-top: 24px;
    text-align: center;
    font-weight: 600;
    }
    .jss280 {
    text-align: center;
    }
    .jss281 {
    color: white;
    margin: 18px;
    padding: 4px 32px;
    font-size: 13px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.29;
    border-radius: 12px;
    letter-spacing: 0.1px;
    }
    @media (max-width:1279.95px) {
    .jss281 {
        padding: 2px 24px;
    }
    }
    .jss282 {
    padding: 10px;
    max-width: 200px;
    background-color: #6682fb;
    }
    .jss283 {
    color: #6682fb;
    }
    .jss284 {
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    position: absolute;
    align-items: center;
    aspect-ratio: 0.8;
    border-radius: 6px;
    justify-content: center;
    }
    .jss285 {
    color: #6682fb;
    border: 0.443077px solid #6682fb;
    display: flex;
    padding: 2.65846px 4.43077px;
    font-size: 7px;
    background: rgba(102, 130, 251, 0.12);
    align-items: center;
    margin-right: 8px;
    border-radius: 4px;
    }
    .jss285 .chipText {
    display: -webkit-box;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    }
    .jss286 {
    width: 100%;
    display: -webkit-box;
    overflow: hidden;
    font-weight: 600;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    }
    .jss287 {
    color: #595959;
    display: -webkit-box;
    overflow: hidden;
    margin-top: 8px;
    font-weight: 400;
    text-overflow: ellipsis;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    }
    .jss288 {
    width: 100%;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    @media (min-width:1500px) {
    .jss288 .MuiCardActions-root {
        margin-top: 10%;
    }
    }
    @media (min-width:2200px) {
    .jss288 .MuiCardActions-root {
        margin-top: 20%;
    }
    }
    .jss289 {
    color: #595959;
    padding: 10px;
    margin-left: 5px;
    }
    .jss289 svg {
    font-size: 18px;
    }
    .jss290 {
    border: 1px solid #D9D9D9;
    padding: 24px;
    box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
    border-left: 4px solid;
    }
    .jss290.color_0 {
    border-left-color: #FE8A59;
    }
    .jss290.color_1 {
    border-left-color: #973DF4;
    }
    .jss290.color_2 {
    border-left-color: #FFC64B;
    }
    .jss290.color_3 {
    border-left-color: #FC02BE;
    }
    .jss291 .MuiGrid-item {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    }
    .jss292 {
    font-weight: 600;
    }
    .jss293 {
    font-size: 15px;
    font-family: Poppins, Helvetica, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.5;
    letter-spacing: 0.1px;
    }
    .jss294 {
    color: #6682fb;
    }
    .jss295 {
    width: 100%;
    padding-bottom: 4px;
    }
    .jss296 {
    padding: 10px;
    font-size: 10px;
    max-width: 200px;
    background-color: #6682fb;
    }
    .jss297 {
    padding: 4px;
    margin-top: 10px;
    margin-right: 10px;
    }
    .jss298 {
    color: #595959;
    font-weight: 400;
    }
    .jss299 {
    top: 0;
    left: 0;
    position: absolute;
    }
    .jss300 {
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-width: 2px;
    }
    .jss301 {
    cursor: pointer;
    transition: transform .2s;
    }
    .jss301:hover {
    transform: scale(1.01);
    }
    </style>
    <style>
        .MuiListItemText-root a{
            text-decoration: none;
            color: #6682fb;
        }
        .MuiListItemText-root .jss51:hover,a:hover{
            color: white;
        }
    </style>
    <style>
        .jss56 div{
            float:right;
            display: inline-block;
            margin-right: 20px;
            
        }
        .MuiBox-root{
            height: 40px;
        }
    </style>
</head>
<body>
    <div id="root">
        <nav class="jss39">
        <div class="MuiDrawer-root MuiDrawer-docked">
            <div class="MuiPaper-root MuiDrawer-paper jss45 MuiDrawer-paperAnchorLeft MuiDrawer-paperAnchorDockedLeft MuiPaper-elevation0">
            <div class="jss40 cFlex"><div class="jss44" style="min-height: fit-content;">
                <div class="MuiBox-root jss56 jss47 cWidthFillAvailable">
                <div class="MuiBox-root jss57">
                    <p class="MuiTypography-root jss49 maxLines2 MuiTypography-body1">
                      <?php echo $email; ?>
                    </p>
                    <p class="MuiTypography-root jss50 MuiTypography-body1">
                    Team Activities
                    </p>
                </div>
                <div class="MuiAvatar-root MuiAvatar-circular jss48">
                    <img alt="ishimwe Oaklynn" src="./images/men.png" class="MuiAvatar-img">
                    </div>
                </div>
            </div>
        <!--Start of side bar -->
            <ul class="MuiList-root MuiList-padding">
                <!--Added List-->
                <li class="MuiListItem-root jss51 MuiListItem-gutters">
                    <div class="MuiListItemIcon-root" style="min-width: 42px;">
                        <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20 12c0-1.1.9-2 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-1.99.9-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2zm-4.42 4.8L12 14.5l-3.58 2.3 1.08-4.12-3.29-2.69 4.24-.25L12 5.8l1.54 3.95 4.24.25-3.29 2.69 1.09 4.11z">

                            </path>
                        </svg>
                    </div>
                    <div class="MuiListItemText-root" id="MuiListItemclickable001">
                        <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                            Activities
                        </span>
                    </div>
                </li>
                <!--end of added list-->
                <li class="MuiListItem-root jss51 MuiListItem-gutters">
                <div class="MuiListItemIcon-root" style="min-width: 42px;">
                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z">

                    </path>
                    </svg>
                </div>
                <div class="MuiListItemText-root" id="MuiListItemclickable002">
                    <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                      Organizers
                    </span>
                    </div>
                </li>
                <li class="MuiListItem-root jss51 MuiListItem-gutters">
                    <div class="MuiListItemIcon-root" style="min-width: 42px;">
                        <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z">

                            </path>
                        </svg>
                    </div>
                    <div class="MuiListItemText-root" id="MuiListItemclickable003">
                        <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                           Teams
                        </span>
                    </div>
                    </li>
                    <li class="MuiListItem-root jss51 MuiListItem-gutters">
                    <div class="MuiListItemIcon-root" style="min-width: 42px;">
                        <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z">

                        </path>
                        </svg>
                    </div>
                    <div class="MuiListItemText-root" id="MuiListItemclickable004">
                        <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                        Users
                        </span>
                    </div>
                    </li>
                    <li class="MuiListItem-root jss51 MuiListItem-gutters">
                    <div class="MuiListItemIcon-root" style="min-width: 42px;">
                        <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z">

                        </path>
                        </svg>
                    </div>
                    <div class="MuiListItemText-root" id="MuiListItemclickable005">
                        <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                        Settings
                        </span>
                    </div>
                    </li>
                    <li class="MuiListItem-root jss51 MuiListItem-gutters">
                            <div class="MuiListItemIcon-root" style="min-width: 42px;">
                            <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z">

                                </path>
                            </svg>
                            </div>
                            <div class="MuiListItemText-root" id="MuiListItemclickable006">
                            <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                                Billing
                            </span>
                            </div>
                        </li>
                    </ul>
                        <div class="cHeightFillAvailable">

                        </div>
                        <ul class="MuiList-root MuiList-padding">
                        <li class="MuiListItem-root jss51 MuiListItem-gutters">
                            <div class="MuiListItemIcon-root" style="min-width: 42px;">
                            <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z">

                                </path>
                            </svg>
                            </div>
                            <div class="MuiListItemText-root" id="MuiListItemclickable007">
                            <span class="MuiTypography-root MuiListItemText-primary MuiTypography-body1 MuiTypography-displayBlock">
                                Sign Out
                            </span>
                            </div>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </nav>
                <!--End of side bar-->
                <!--Start of main section of the Application-->
                <main class="jss46">
                <h1 style="text-align: center;margin: 30px;"></h1>
                <div class="MuiTabs-root hq-tabs jss242">
                    <div class="MuiButtonBase-root MuiTabScrollButton-root MuiTabs-scrollButtons MuiTabs-scrollButtonsDesktop Mui-disabled" aria-disabled="false">
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M15.41 16.09l-4.58-4.59 4.58-4.59L14 5.5l-6 6 6 6z">

                        </path>
                        </svg>
                    </div>
                    <div class="MuiTabs-scrollable" style="width: 99px; height: 99px; position: absolute; top: -9999px; overflow: scroll;"></div>
                    <div class="MuiTabs-scroller MuiTabs-scrollable" style="margin-bottom: 0px;">
                        <div class="MuiTabs-flexContainer" role="tablist">
                        <button class="MuiButtonBase-root MuiTab-root MuiTab-textColorPrimary jss243 Mui-selected" tabindex="0" type="button" role="tab" aria-selected="true">
                            <span class="MuiTab-wrapper">
                            <span class="jss244">
                                Activities
                            </span>
                            </span>
                        </button>
                        <button class="MuiButtonBase-root MuiTab-root MuiTab-textColorPrimary jss243" tabindex="-1" type="button" role="tab" aria-selected="false">
                            <span class="MuiTab-wrapper">
                            <span class="jss244">Quizzes</span>
                            </span>
                        </button>
                        <button class="MuiButtonBase-root MuiTab-root MuiTab-textColorPrimary jss243" tabindex="-1" type="button" role="tab" aria-selected="false">
                            <span class="MuiTab-wrapper">
                            <span class="jss244">
                                Pictionary
                            </span>
                            </span>
                        </button>
                        <button class="MuiButtonBase-root MuiTab-root MuiTab-textColorPrimary jss243" tabindex="-1" type="button" role="tab" aria-selected="false">
                            <span class="MuiTab-wrapper">
                            <span class="jss244">
                                Polls
                            </span>
                            </span>
                        </button>
                        </div>
                        <span class="jss246 jss248 MuiTabs-indicator" style="left: 0px; width: 109.771px;">

                        </span>
                    </div>
                    <div class="MuiButtonBase-root MuiTabScrollButton-root MuiTabs-scrollButtons MuiTabs-scrollButtonsDesktop" aria-disabled="false">
                        <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeSmall" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z">

                        </path>
                        </svg>
                    </div>
                    </div>
        <!--Start of Table fetching data from database-->
        <div class="MuiBox-root jss144 jss139">
          <div class="activities" id="Pricing" >
            <!--fifth row-->
            <div class="Grant_parent_block">
                <div style="font-weight: bolder;font-size: 30px;text-align: center;margin-bottom: 100px;margin-top:20px;color:#595959"><h1>Pricing Plan</h1></div>
                <div class="parent_block01">
                    <div id="Block01" class="text01" >
                        <h1>Free Plan(User)</h1>
                        <P><b>$0 </b>/Month</P>
                        <span>Free plan for all Users To open Account</span>
                        <div>
                            <ul>
                                <li>Full&nbsp;Access</li>
                                <li>All&nbsp;Activites</li>
                                <li>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                    <div id="Block02" class="text01">
                        <h1>Free P(Organizer)</h1>
                        <P><b>$0 </b>/Month</P>
                        <span>Free plan for all Users To open Account</span>
                        <div>
                            <ul>
                                <li>Full&nbsp;Access</li>
                                <li>All&nbsp;Activites</li>
                                <li>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                    <div id="Block03" class="text01">
                        <h1>Guest Plan</h1>
                        <P><b>$0 </b>/Month</P>
                        <span>Free plan for all Users To open Account</span>
                        <div>
                            <ul>
                                <li>No&nbsp;access</li>
                                <li>No&nbsp;Action</li>
                                <li>No&nbsp;Dash</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
                                    document.getElementById('MuiListItemclickable001')
                                        .addEventListener('click', function () {
                                            window.location.href = './index.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable002')
                                        .addEventListener('click', function () {
                                            window.location.href = './calendar.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable003')
                                        .addEventListener('click', function () {
                                            window.location.href = './team.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable004')
                                        .addEventListener('click', function () {
                                            window.location.href = './users.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable005')
                                        .addEventListener('click', function () {
                                            window.location.href = './setting.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable006')
                                        .addEventListener('click', function () {
                                            window.location.href = './billing.php';
                                    });
                                  </script>
                                  <script>
                                    document.getElementById('MuiListItemclickable007')
                                        .addEventListener('click', function () {
                                            window.location.href = './logout.php';
                                    });
                                  </script>
        <!--End of table fetching from database-->
        <!--Ending of main section of the Application-->
    </main>
</body>
  <footer></footer>
</html>