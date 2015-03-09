###
天气插件
仅支持国内城市（中文）
请至 http://www.tuling123.com 注册以得到自己的 api_key
###

module.exports = (content ,send, robot, message)->

  if ret = content.match /^(.*)天气$/
    city = ret[1]
    robot.request.get {url:'http://www.tuling123.com/openapi/api?key=your_api_key&info=' + encodeURI(city + "天气"),json:true}, (e,r,data)->      
      if data.code is 100000
        send data.text
      else
        send "查不到 ╮(╯_╰)╭"

