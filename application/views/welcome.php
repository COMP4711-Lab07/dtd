<form action="/" method="post">
    <fieldset>
        <legend>Search</legend>
        Days of the week: 
        <select name="day">
            {daycode}
            <option value="{code}">{code}</option>
            {/daycode}
        </select>

        Timeslot: 
        <select name="time">
            {timeslot}
            <option value="{code}">{code}</option>
            {/timeslot}
        </select>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
    
</form>

<br/>
{schedule}
    <a href="">{filename}</a>
    <br/>
{/schedule}
<br/>

<br/>
<p>Search Result</p>
    <table border="1">
        <tr>
            <td>Course</td>
            <td>Day</td>
            <td>Time</td>
            <td>Instructor</td>
            <td>Room</td>
        </tr>
        {search_result}
        <tr>
            <td>{courseno}</td>
            <td>{day}</td>
            <td>{time}</td>
            <td>{instructor}</td>
            <td>{room}</td>
        </tr>
        {/search_result}
    </table>
<br/><br/>
