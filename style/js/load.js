//Register Small Enterprise Form
$(document).ready(function() {
    $("#register_se").click(function() {
        $(".body1").load("form/re_sm.php")
    });
});
//Register Admin  Form
$(document).ready(function() {
    $("#register_admin").click(function() {
        $(".body1").load("form/re_admin.php");
    });
});

//Register Kebele  Form
$(document).ready(function() {
    $("#register_kebele").click(function() {
        $(".body1").load("form/re_kebele.php");
    });
});

//create account
$(document).ready(function() {
    $("#cr_account").click(function() {
        $.post("form/create_account.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//SE Send Letter Form
$(document).ready(function() {
    $("#se_send_letter").click(function() {
        $.post("Letter_Form/se_send_letter.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//SE Send outbox Letter
$(document).ready(function() {
    $("#se_outbox_letter_tb").click(function() {
        $.post("in_out_box_Letter/se_outbox_table.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//SE Send inbox Letter 
$(document).ready(function() {
    $("#se_inbox_letter_tb").click(function() {
        $.post("in_out_box_Letter/se_inbox_table.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//Kebele Send Letter Form
$(document).ready(function() {
    $("#kb_send_letter").click(function() {
        $.post("Letter_Form/kb_send_letter.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//ms_send_letter
$(document).ready(function() {
    $("#ms_send_letter").click(function() {
        $.post("Letter_Form/ms_send_letter.php", function(data) {
            $(".body1").html(data);
        });
    });
});
//Manager Liste
$(document).ready(function() {
    $("#view_manager").click(function() {
        $.post("Registered/manager_list.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//Kebele Liste
$(document).ready(function() {
    $("#view_kebele").click(function() {
        $.post("Registered/kebele_list.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//Small Enterprise Liste
$(document).ready(function() {
    $("#view_se").click(function() {
        $.post("Registered/sm_list.php", function(data) {
            $(".body1").html(data);
        });
    });
});

//Report
$(document).ready(function() {
    $("#report").click(function() {
        $(".body1").load("Report/report.php")
    });
});

//alert
$(document).ready(function() {
    $("#info").click(function() {
        alert("amare");
    });
});