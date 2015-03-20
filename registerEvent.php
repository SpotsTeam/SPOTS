<html>
<head><title>SPOTS Driver Page</title></head>
<body>

        <h2>Register Event</h2>
        <form method = "post" action="registerEvent.php">
                Event Name: <input type="text" name="eventName" /><br/>
                Date (MM/DD/YYYY): <input type="text" name="eventDate" /><br/>
                Start Time (00:00 AM/PM): <input type="text" name="startTime" /><br/>
                End Time (00:00 AM/PM): <input type="text" name="endTime" /><br/>
                Category: <select name="category">
                        <option value="Football">Football</option>
                        <option value="Basketball">Basketball</option>
                        <option value="Lacrosse">Lacrosse</option>
                        <option value="Soccer">Soccer</option>
                        <option value="Volleyball">Volleyball</option>
                        <option value="Track & Field">Track & Field</option>
                        <option value="Lecture">Lecture</option>
                        <option value="Dance">Dance</option>
                        <option value="Music">Music</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Church">Church</option>
                        <option value="Frat Party">Frat Party</option>
                        <option value="Other">Other</option>
                    </select></br>
                Enter Address:</br>
                <span style="padding: 0 20px">&nbsp;</span>Street: <input type="text" name="address" /><br/>
                <span style="padding: 0 20px">&nbsp;</span>City: <input type="text" name="city" /><br/>
                <span style="padding: 0 20px">&nbsp;</span>State: <select name="state">
                        <option value="AL">AL</option>
                        <option value="AK">AK</option>
                        <option value="AZ">AZ</option>
                        <option value="AR">AR</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="HI">HI</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="IA">IA</option>
                        <option value="KA">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="ME">ME</option>
                        <option value="MD">MD</option>
                        <option value="MA">MA</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MS">MS</option>
                        <option value="MO">MO</option>
                        <option value="MT">MT</option>
                        <option value="NE">NE</option>
                        <option value="NV">NV</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NY">NY</option>
                        <option value="NC">NC</option>
                        <option value="ND">ND</option>
                        <option value="OH">OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VT">VT</option>
                        <option value="VA">VA</option>
                        <option value="WA">WA</option>
                        <option value="WV">WV</option>
                        <option value="WI">WI</option>
                        <option value="WY">WY</option>
                        <option value="DC">DC</option>
</select></br>
                <span style="padding: 0 20px">&nbsp;</span>ZipCode: <input type="text" name="zipcode" /></br>
                <input type="submit" />
        </form>
</body>

<html>

