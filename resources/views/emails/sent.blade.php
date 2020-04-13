@component('mail::message', ['info' => $info])
{{ Carbon\Carbon::now()->toFormattedDateString() }} <br>

Dear Ma'am/Sir: <br>

Good day! {{ $info }}<br>
    
We respectfully forward to your good office a copy of the following communication/correspondence <i>(see attached file)</i> for your information and/or appropriate action. <br>

@component('mail::table')
    <table>
    <tr>
        <td colspan="2"><center><b>Communication/Correspondce Details</b></center></td>
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

Thank you and <b>kindly acknowledge upon receipt</b><br>

Best regards,<br>

<b>OMCC Secretariat</b>
@endcomponent

@endcomponent
