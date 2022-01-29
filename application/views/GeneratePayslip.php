<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        h2{
            text-align: center;
        }
        
        .title{
            width: 4cm;
            background-color: #c1c1c1;
            border: 0.5px solid black;
        }
        .content{
            width: 5cm;
            border: 0.5px solid black;
        }
        /* ------ */
        .tableHead{
            width: 2.7cm;
            background-color: #c1c1c1;
            border: 0.5px solid black; 
        }
        .tableContent{
            border: 0.5px solid black;
            font-weight: lighter;
        }
        .tableHead-day-amount{
            width: 3.5cm;
        }
        td{
            text-align: center;
        }
        note{
           color: red; 
        }
        /* ---- */
        .releaseBy{
            margin-right: 6.3cm;
        }
        .releaseBy, .employeeSignature{
            display: inline-block;
        }
        hr{
            border-top: 3px dashed black;
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <h2>Prime Lamination Inc. Payslip</h2>
        <table>
            <tbody>
                <tr>
                    <td class="title">Company</td>
                    <td class="content">gago</td>
                    <td class="title">Employee Name</td>
                    <td class="content">tangina</td>
                </tr>
                <tr>
                    <td class="title">Payment Date</td>
                    <td class="content"></td>
                    <td class="title">Position</td>
                    <td class="content"></td>
                </tr>
                <tr>
                    <td class="title">Payment Method</td>
                    <td class="content"></td>
                    <td class="title">Employee Number</td>
                    <td class="content"></td>
                </tr>
            </tbody>
        </table>
        <p><note>Note:</note> Sunday rate is considered as overtime.</p>
        <table>
            <thead>
                <tr>
                    <th class="tableHead tableHead-day-amount">Day</th>
                    <th class="tableHead">Rate (Php.)</th>
                    <th class="tableHead">Overtime (Hrs.)</th>
                    <th class="tableHead">Late (Hrs.)</th>
                    <th class="tableHead">Deduction (Php.)</th>
                    <th class="tableHead tableHead-day-amount">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tableContent tableHead-description-year">Monday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">2</td>
                    <td class="tableContent">1</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">5000</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Tuesday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">1</td>
                    <td class="tableContent">2</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Wednesday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">3</td>
                    <td class="tableContent">3</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Tdursday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">4</td>
                    <td class="tableContent">4</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Friday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">5</td>
                    <td class="tableContent">5</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Saturday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">6</td>
                    <td class="tableContent">6</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Sunday</td>
                    <td class="tableContent"></td>
                    <td class="tableContent">10</td>
                    <td class="tableContent">0</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                   
                </tr>
                <tr>
                    <td class="tableContent tableHead tableHead-description-year">Total</td>
                    <td class="tableContent tableHead">3222</td>
                    <td class="tableContent tableHead">31</td>
                    <td class="tableContent tableHead">21</td>
                    <td class="tableContent tableHead">300</td>
                    <td class="tableContent tableHead tableHead-day-amount">5000</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <div class="signature">
        <div class="releaseBy">
            <p>Released by: <br><b>Prime Lamination Inc.</b></p>
        </div>
        <div class="employeeSignature">
            <p>_________________________________<br>Employer's Signature over Printed Name</p>
        </div>
    </div>
    <hr>
    <div>
        <h2>Prime Lamination Inc. Payslip</h2>
        <table>
            <tbody>
                <tr>
                    <td class="title">Company</td>
                    <td class="content">gago</td>
                    <td class="title">Employee Name</td>
                    <td class="content">tangina</td>
                </tr>
                <tr>
                    <td class="title">Payment Date</td>
                    <td class="content"></td>
                    <td class="title">Position</td>
                    <td class="content"></td>
                </tr>
                <tr>
                    <td class="title">Payment Method</td>
                    <td class="content"></td>
                    <td class="title">Employee Number</td>
                    <td class="content"></td>
                </tr>
            </tbody>
        </table>
        <p><note>Note:</note> Sunday rate is considered as overtime.</p>
        <table>
            <thead>
                <tr>
                    <th class="tableHead tableHead-day-amount">Day</th>
                    <th class="tableHead">Rate (Php.)</th>
                    <th class="tableHead">Overtime (Hrs.)</th>
                    <th class="tableHead">Late (Hrs.)</th>
                    <th class="tableHead">Deduction (Php.)</th>
                    <th class="tableHead tableHead-day-amount">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tableContent tableHead-description-year">Monday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">2</td>
                    <td class="tableContent">1</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">5000</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Tuesday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">1</td>
                    <td class="tableContent">2</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Wednesday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">3</td>
                    <td class="tableContent">3</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Tdursday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">4</td>
                    <td class="tableContent">4</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Friday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">5</td>
                    <td class="tableContent">5</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Saturday</td>
                    <td class="tableContent">537</td>
                    <td class="tableContent">6</td>
                    <td class="tableContent">6</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                    
                </tr>
                <tr>
                    <td class="tableContent tableHead-description-year">Sunday</td>
                    <td class="tableContent"></td>
                    <td class="tableContent">10</td>
                    <td class="tableContent">0</td>
                    <td class="tableContent"></td>
                    <td class="tableContent tableHead-day-amount">12</td>
                   
                </tr>
                <tr>
                    <td class="tableContent tableHead tableHead-description-year">Total</td>
                    <td class="tableContent tableHead">3222</td>
                    <td class="tableContent tableHead">31</td>
                    <td class="tableContent tableHead">21</td>
                    <td class="tableContent tableHead">300</td>
                    <td class="tableContent tableHead tableHead-day-amount">5000</td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <div class="signature">
        <div class="releaseBy">
            <p>Released by: <br><b>Prime Lamination Inc.</b></p>
        </div>
        <div class="employeeSignature">
            <p>_________________________________<br>Employer's Signature over Printed Name</p>
        </div>
    </div>
</body>
</html>