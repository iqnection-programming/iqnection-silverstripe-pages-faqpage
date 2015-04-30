<h1>$Title</h1>
$Content
<% if FAQItems %>
    <div id="FAQItems">
        <% control FAQItems %>
            <div class="FAQItem">
                <a class="FAQQuestion" href="javascript:;">$Question</a>
                <div class="FAQAnswerMask">
                    <div class="FAQAnswer">
                        <br />
                        $Answer
                    </div>
                </div>
            </div><!---FAQItem$Pos-->
        <% end_control %>
    </div><!--FAQItems-->
<% end_if %>