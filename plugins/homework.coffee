###
作业查询
请将 homework.php 放在你的网站目录下，访问 homework.php 可以修改作业内容
###

module.exports = (content, send, robot, message)->

  if ret = content.match /^作业$/
    robot.request.get {url:'http://your_host/homework.txt', text:true}, (e, r, data)->
      send data
