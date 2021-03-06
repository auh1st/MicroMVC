什么是 DMVC+C 架构？基于传统MVC架构的基础上，增加了 Data 层和 Cache 层。
![对比1](http://wx3.sinaimg.cn/large/3eab3a68ly1g1a6spg8c0j20d80kwgn0.jpg)

DMVC+C架构每层分工：

View层：负责页面渲染。
1. 接收Controller层传递的数据进行渲染；
2. 根据HTML、CSS、JS等控制页面布局和渲染。

Controller层：根据接口业务逻辑聚合Model层结果输出，只能调用Model和Cache。
1. 判断接口Auth相关的合法性验证；
1. 接收参数、检验参数合法性；
1. 根据接口业务逻辑聚合Model结果并输出；
1. 控制输出内容的安全检验,包括内容主体和报头部分；
1. 记录接口日志相关；

Model层：业务逻辑的集中体现层，利用Data层或其他资源依赖完成业务逻辑。可以调用Data或Model或Cache。
1. 参数合法性检验；
1. 根据业务需求组织Data或聚合其他Model，完成业务逻辑；
1. 记录业务逻辑日志；

Data层：数据处理层，聚焦自身的数据存储和数据结构处理,对上层屏蔽数据组织形式和存储介质等。
1. 对外屏蔽存储介质，Mysql、Reids等；
1. 对外屏蔽存储结构，Hash、关系表、数据编解码等，输出固定数据结构。
1. 记录资源层日志；

Cache层：缓存层，从Data、Model层剥离出缓存逻辑统一管理，可以调用Data层和Model层。
1. 检查缓存是否存在；
1. 整理数据结构，输出固定数据；
1. 种缓存；
1. 记录资源日志；

为什么这么做？
1. 缓存统一管理；
1. 数据层统一管理,方便可能的迁移和微服务化改造；
1. 方便扩展、迁移等；
1. 增加项目可读性，便于项目管理；