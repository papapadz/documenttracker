@component('mail::message')

{{ Carbon\Carbon::now()->toFormattedDateString() }} <br>

Dear Ma'am/Sir: <br>

Good day! <br>
    
We respectfully forward to your good office a copy of the following communcation/correspondence for your information and/or appropriate action. <br>

@component('mail::table')
    <table>
    <tr>
        <td colspan="2"><b>Communication/Correspondce Details</b></td>
    </tr>
    <tr>
        <td><b>Type of Communication</b></td>
        <td>Hospital Memorandum</td>
    </tr>
    <tr>
        <td><b>Control No.</b></td>
        <td>ICO-155</td>
    </tr>
    <tr>
        <td><b>Date</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Subject</b></td>
        <td>Please see attached file</td>
    </tr>
    <tr>
        <td><b>Originator</b></td>
        <td>Medical Center Chief</td>
    </tr>
    </table>
@endcomponent
<br>
Best regards,<br>
<b>OMCC Secretariat</b>
@endcomponent
