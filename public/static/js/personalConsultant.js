
$(function() {
    updateInputTags();
    updateTagBtnGroupClass();
    updateServicesBtnGroupClass($('#consultantServiceBtnGroup'),services);
});
function consultantBasicInfoSubmit() {

    var relative= new Array();
    var usertag = consultant.tag;
    var consultantTag = {};
    for (var x in usertag) {
        consultantTag [x] = {};
        for (var y in usertag[x]) {
            consultantTag [x][y] = usertag[x][y];
        }
    }
    for (var num=1;num<=count;num++)
    {
        var onecon = allTags[num].tag;
        var eachconsultantTag = {};
        relative[num]=0;
        for (var x in onecon) {
            eachconsultantTag [x] = {};
            for (var y in onecon[x]) {
                eachconsultantTag [x][y] = onecon[x][y];
                if(eachconsultantTag [x][y] ==1&&consultantTag[x][y]==1){
                   {
                       if(x=="country")
                        relative[num]+=0.4;
                       if(x=="major")
                           relative[num]+=0.4;
                       if(x=="type")
                           relative[num]+=0.2;
                    }
                }
            }
        }
    }
    var trans=Array();
    for(var i=1;i<=count;i++){
        trans[i]=i;
    }
    for(var i=1;i<=count;i++)
    {
        for(var j=count;j>=1;j--)
        {
            if(relative[j]>relative[j-1])
            {
               var temp=trans[j];
                trans[j]=trans[j-1];
                trans[j-1]=temp;
                temp=relative[j];
                relative[j]=relative[j-1];
                relative[j-1]=temp;
            }
        }
    }
    var result="";
    for(var i=1;i<=count;i++){

        result+="<div class='col-md-6'>";
        result+="<a id='consultantDisplay_'"+idmap[trans[i]]+"' href='/space_"+idmap[trans[i]]+"' class='consultantinfo2' style=&quot;background-image: url('"+photoaddrmap[trans[i]]+"')&quot;> "
        result+="<div class='blueborder'></div><img src='"+photoaddrmap[trans[i]]+"'>";
        result+="<h2>"+namemap[trans[i]]+"</h2>";
        result+="<h2><span class='glyphicon glyphicon-map-marker'></span>"+universitymap[trans[i]]+"</h2></a></div>";






    }
    $("#showresult").empty();
    $("#showresult").append(result);
    var data = {};
    data['relative'] = relative;
    ajaxData('/personalconsultant',data);
}

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

function changeOption(element)
{
    var tag = consultant.tag;
    var isactive = false;
    if(typeof(tag['country'][element.value]) != "undefined")
    {
        tag['country'][element.value] = true ^ tag['country'][element.value];
        isactive = tag['country'][element.value];

        if(isactive)
            $(element).addClass("btn-primary");
        else
            $(element).removeClass("btn-primary");

    }
    else if(typeof(tag['type'][element.value]) != "undefined")
    {
        tag['type'][element.value] = true ^ tag['type'][element.value];
        isactive = tag['type'][element.value];
        if(isactive)
            $(element).addClass("btn-success");
        else
            $(element).removeClass("btn-success");
    }
    else if(typeof(tag['major'][element.value]) != "undefined")
    {
        tag['major'][element.value] = true ^ tag['major'][element.value];
        isactive = tag['major'][element.value];
        if(isactive)
            $(element).addClass("btn-info");
        else
            $(element).removeClass("btn-info");
    }
    consultant.tag = tag;
    updateInputTags();
}
function updateTagBtnGroupClass()
{
    var tag = consultant.tag;
    for(x in tag)
    {
        $('.' + x + ' button').each(function(){
            if(tag[x][$(this).attr('value')] == 1)
            {
                // $(this).addClass('active');
                switch (x)
                {
                    case 'country':
                        $(this).addClass('btn-primary');
                        break;
                    case 'major':
                        $(this).addClass('btn-info');
                        break;
                    case 'type':
                        $(this).addClass('btn-success');
                        break;
                    default :
                        break;
                }
            }
        });
    }
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
    var tagInfo = "<div id='consultant_regist_tag_country'>国家：";
    for(var name in tag['country'])
    {
        if(tag['country'][name] == 1 || tag['country'][name] == '1')
        {
            tagInfo += "<span class='label label-primary' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
        }
    }
    tagInfo +="</div>";
    tagInfo += "<hr/>";
    tagInfo += "<div id='consultant_regist_tag_major'>专业：";
    for(var name in tag['major'])
    {
        if(tag['major'][name] ==1 || tag['major'][name] == '1')
        {
            tagInfo += "<span class='label label-info' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
        }
    }
    tagInfo +="</div>";
    tagInfo += "<hr/>";
    tagInfo += "<div id='consultant_regist_tag_type'>类型：";
    for(var name in tag['type'])
    {
        if(tag['type'][name] == 1 || tag['type'][name] == '1')
        {
            tagInfo += "<span class='label label-success' data-name='" + name + "'>" + text[name] + "</span>&nbsp;&nbsp;&nbsp;";
        }
    }
    tagInfo +="</div>";
    $("#input_tags").empty();
    $("#input_tags").append(tagInfo);
}