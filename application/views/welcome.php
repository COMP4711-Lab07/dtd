<form action="demo_form.asp" method="get">
    Days of the week: 
    <select name="day">
        {daycode}
        <option value="{code}">{code}</option>
        {/daycode}
    </select>
  
  <input type="submit" value="Submit">
</form>

<form action="demo_form.asp" method="get">
    Timeslot: 
    <select name="day">
        {timeslot}
        <option value="{code}">{code}</option>
        {/timeslot}
    </select>
  
  <input type="submit" value="Submit">
</form>

<table>
    <tr>
        <td>Course</td>
        <td>Day</td>
        <td>Time</td>
        <td>Instructor</td>
        <td>Room</td>
    </tr>
    {daybookings}
    <tr>
        <td>{courseno}</td>
        <td>{day}</td>
        <td>{time}</td>
        <td>{instructor}</td>
        <td>{room}</td>
    </tr>
    {/daybookings}
</table>

<br/>
{schedule}
    <a href="">{filename}</a>
    <br/>
{/schedule}
<br/>
<p>Testing daybooking</p>
{daybookings}
    {time}<br/>
    {courseno}<br/>
    {instructor}<br/>
    {room}<br/>
{/daybookings}
<br/><br/>

<br/>
<p>Testing periodbooking</p>
{periodbookings}
    {day}<br/>
    {time}<br/>
    {courseno}<br/>
    {instructor}<br/>
    {room}<br/>
{/periodbookings}
<br/><br/>

<br/>
<p>Testing coursebookings</p>
{coursebookings}
    {day}<br/>
    {time}<br/>
    {courseno}<br/>
    {instructor}<br/>
    {room}<br/>
{/coursebookings}
<br/><br/>