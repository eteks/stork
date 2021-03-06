$(function(e) {
    var a = {
            number: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
            "short": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            "long": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
        },
        t = new Date,
        r = t.getFullYear(),
        n = t.getMonth() + 1;
    t.getDate();
    updateTheBirthDayValue = function(e, a, t, r, n) {
    		t * r * n != 0 && (10 > r && (r = "0" + r), 10 > n && (n = "0" + n), hiddenDate = t + "-" + r + "-" + n, a.val(hiddenDate), e.callback && e.callback(hiddenDate))
    }, generateBirthdayPicker = function(t, i) {
        var l = t.attr("id").replace(/-/g, ""),
            o = e("<fieldset class='birthdayPicker'></fieldset>"),
            d = e("<select class='birthYear " + i.sizeClass + "' name='" + l + "_birth[year]'><option value=''>Select Year</option></select>"),
            p = e("<select class='birthMonth " + i.sizeClass + "' name='" + l + "_birth[month]'><option value=''>Select Month</option></select>"),
            s = e("<select class='birthDate " + i.sizeClass + "' name='" + l + "_birth[day]'><option value=''>Select Date</option></select>");
        //$birthday = e("<input class='birthDay' name='" + l + "_birthDay' type='hidden' value=''/>"), i.placeholder && (e("<option value='0'>Year</option>").appendTo(d), e("<option value='0'>Month</option>").appendTo(p), e("<option value='0'>Day</option>").appendTo(s)), "bigEndian" == i.dateFormat ? o.append(d).append(p).append(s) : "littleEndian" == i.dateFormat ? o.append(s).append(p).append(d) : o.append(p).append(s).append(d);
        $birthday = e("<input class='birthDay' name='" + l + "_birthDay' type='hidden' value=''/>"), i.placeholder && "bigEndian" == i.dateFormat ? o.append(d).append(p).append(s) : "littleEndian" == i.dateFormat ? o.append(s).append(p).append(d) : o.append(p).append(s).append(d);
        var h = r - i.minAge,
            c = r - i.maxAge;
        i.maxYear != r && i.maxYear > r && (h = i.maxYear, c += i.maxYear - r);
        for (var u = h; u >= c; u--) e("<option></option>").attr("value", u).text(u).appendTo(d);
        for (var u = 0; 11 >= u; u++) e("<option></option>").attr("value", u + 1).text(a[i.monthFormat][u]).appendTo(p);
        for (var u = 1; 31 >= u; u++) {
            var v = 10 > u ? "0" + u : u;
            e("<option></option>").attr("value", u).text(v).appendTo(s)
        }
        if (o.append($birthday), t.append(o), i.defaultDate) {
            var m = new Date(i.defaultDate);
            d.val(m.getFullYear()), p.val(m.getMonth() + 1), s.val(m.getDate()), updateTheBirthDayValue(i, $birthday, m.getFullYear(), m.getMonth() + 1, m.getDate())
        }
        o.on("change", function() {
        	if(d.val() !='' && p.val() !='' && s.val() != ''){
	            $birthday = e(this).find(".birthDay"), selectedYear = parseInt(d.val(), 10), selectedMonth = parseInt(p.val(), 10), selectedDay = parseInt(s.val(), 10);
	            var t = p.children(":last").val();
	            if (selectedYear > r) {
	                if (t > n)
	                    for (; t > n;) p.children(":last").remove(), t--
	            } else
	                for (; 12 > t;) e("<option></option>").attr("value", parseInt(t) + 1).text(a[i.monthFormat][t]).appendTo(p), t++;
	            var l = s.children(":last").val(),
	                o = new Date(selectedYear, selectedMonth, 0).getDate();
	            if (l > o)
	                for (; l > o;) s.children(":last").remove(), l--;
	            else if (o > l)
	                for (; o > l;) {
	                    var h = parseInt(l) + 1,
	                        c = 10 > h ? "0" + h : h;
	                    e("<option></option>").attr("value", h).text(c).appendTo(s), l++
	                }
	            updateTheBirthDayValue(i, $birthday, selectedYear, selectedMonth, selectedDay)
            }
        })
    }, e.fn.birthdayPicker = function(a) {
        return this.each(function() {
            var t = e.extend(e.fn.birthdayPicker.defaults, a);
            generateBirthdayPicker(e(this), t)
        })
    }, e.fn.birthdayPicker.defaults = {
        maxAge: 60,
        minAge: 12,
        maxYear: r,
        dateFormat: "littleEndian",
        monthFormat: "number",
        placeholder: !0,
        defaultDate: !1,
        sizeClass: "span2",
        callback: !1
    }
}(jQuery));