<h1>$Title</h1>
$Content
<% if $FaqItems.Count %>
    <div id="faq-items">
        <% loop $FaqItems %>
            <% include FaqItem %>
        <% end_loop %>
    </div><!--faq-items-->
<% end_if %>