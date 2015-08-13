<h1>$Title</h1>
$Content
<% if FAQItems %>
    <div id="FAQItems">
        <% loop FAQItems %>
            <div class="FAQItem">
				<div class="FAQIcon"></div>
                <a class="FAQQuestion" href="javascript:;">$Question</a>
                <div class="FAQAnswerMask">
                    <div class="FAQAnswer">
                        <br />
                        $Answer
                    </div>
                </div>
				<div class="FAQExpand"></div>
            </div><!---FAQItem$Pos-->
        <% end_loop %>
    </div><!--FAQItems-->
<% end_if %>