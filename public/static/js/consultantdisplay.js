/**
 * Created by v5 on 2015/7/3.
 */
function registConsultantDisplayPopover(element,placement,title,introduction,services,viewHref)
{
    try {
        if (isNull(title)) title = '顾问信息';
        var contentMcimg = $('<div></div>').addClass('mcimg');
            var contentNewp = $('<div></div>').addClass('newp');
                var contentNewpIntroTitle = $('<h4></h4>').append('个人简介');
                var contentNewpIntroContent = $('<p></p>').addClass('text-primary').append(introduction);
            contentNewp.append(contentNewpIntroTitle).append(contentNewpIntroContent);
                var contentNewpServiceTitle = $('<h4></h4>').append('开设服务');
                var contentNewpServiceContent = getServicesLabels(services);
            contentNewp.append(contentNewpServiceTitle).append(contentNewpServiceContent);
        contentMcimg.append(contentNewp);
            var viewLink = $('<a></a>').addClass('btn').addClass('btn-primary').addClass('btn-block').attr('href',viewHref).append('查看TA的主页');
        contentMcimg.append(viewLink);

        $(element).popover({
            trigger: 'manual',
            placement: placement, //placement of the popover. also can use top, bottom, left or right
            title: '<div style="text-align:center; color:gray; font-size:14px;">' + title + '</div>', //this is the top title bar of the popover. add some basic css
            html: 'true', //needed to show html of course
            content: contentMcimg,
            animation: true
        }).on("mouseenter", function () {
            var _this = this;
            $(this).popover("show");
            $(this).siblings(".popover").on("mouseleave", function () {
                $(_this).popover('hide');
            });
        }).on("mouseleave", function () {
            var _this = this;
            setTimeout(function () {
                if (!$(".popover:hover").length) {
                    $(_this).popover("hide")
                }
            }, 100);
        });
    }
    catch (e)
    {
        catchClientError(e);
    }
}


