###
价格查询
请至 http://www.tuling123.com 注册以得到自己的 api_key
###

module.exports = (content ,send, robot, message)->

  if ret = content.match /(.*)(多少钱|价格)$/
    item = ret[1]
    robot.request.get {url:'http://www.tuling123.com/openapi/api?key=your_api_key&info=' + encodeURI(item + "价格"), json:true}, (e,r,data)->      
      if data and data.code is 311000
        out = ''
        for list in data.list
          out += list.name + '  ' + list.price + '\n'
        send out + data.list[0].detailurl
      else
        send "查不到 ╮(╯_╰)╭ "
