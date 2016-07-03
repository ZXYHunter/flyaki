
$(function() {
    updateInputTags();
    updateServicesBtnGroupClass($('#consultantServiceBtnGroup'),services);
});

function consultantTag(savedTag)
{
    this.tag = getOriginalTag(savedTag);
    this.text = getOriginalTextArray();
    function getOriginalTextArray()
    {
        var text = new Array();
        text['southamerica'] = "南美";
        text['northamerica'] = "北美";
        text['british'] = "英国";
        text['australia'] = "澳新";
        text['korea'] = "韩日";
        text['singapore'] = "新加坡";
        text['science'] = "理科";
        text['social'] = "文科";
        text['engineer'] = "工科";
        text['business'] = "商科";
        text['others'] = "其它";
        text['undergraduate'] = "本科生";
        text['graduate'] = "研究生";
        text['phd'] = "PhD";
        return text;
    }
    function getOriginalTag(savedTag)
    {
        if(isNull(savedTag))
        {
            var tag = new Array();
            tag['country'] = new Array();
            tag['major'] = new Array();
            tag['type'] = new Array();
            tag['country']['southamerica'] = 0;
            tag['country']['northamerica'] = 0;
            tag['country']['korea'] = 0;
            tag['country']['british'] = 0;
            tag['country']['australia'] = 0;
            tag['country']['singapore'] = 0;
            tag['major']['science'] = 0;
            tag['major']['social'] = 0;
            tag['major']['engineer'] = 0;
            tag['major']['business'] = 0;
            tag['major']['others'] = 0;
            tag['type']['undergraduate'] = 0;
            tag['type']['graduate'] = 0;
            tag['type']['phd'] = 0;
            return tag;
        }
        else
        {
            return savedTag;
        }
    }
}
consultantTag.prototype = {
    constructor: consultantTag,//原型字面量方式会将对象的constructor变为Object，此外强制指回Person
}

function updateServicesBtnGroupClass(element,services)
{
    var count = 0;
    $(element).find('button').each(function(){
        if(services[count++] == 1)
        {
            $(this).addClass('active');
        }
    });
}
function updateInputTags()
{
    var tag = consultant.tag;
    var text = consultant.text;
    var tagInfo = "<div id='consultant_regist_tag_country'>";
    var count=0;

    for(var name in tag['country'])
    {
        if(tag['country'][name] == 1 || tag['country'][name] == '1')
        {

            tagInfo += "<span class='label label-primary' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
            count+=1;
        }
    }
    for(var name in tag['major'])
    {
        if(tag['major'][name] ==1 || tag['major'][name] == '1')
        {

            tagInfo += "<span class='label label-info' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
            count+=1;
        }
    }
    for(var name in tag['type'])
    {
        if(tag['type'][name] == 1 || tag['type'][name] == '1')
        {

            tagInfo += "<span class='label label-success' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
            count+=1;
        }
    }
    tagInfo +="</div>";
    $("#input_tags").empty();
    $("#input_tags").append(tagInfo);
}