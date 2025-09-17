# 如何配置支付宝支付

---

## 登录支付宝商家后台,我是商家用户>我是支付宝商家

- 支付宝官网：[alipay.com](http://alipay.com)

## 签约电脑网站支付、手机网站支付

- 产品中心>支付产品

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/49669_klld_6689.png)

## 签约成功后进入“自行研发接入”

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/49783_f953_3791.png)

## 创建应用

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/49873_3wh1_5193.png)

## 添加能力：电脑网站支付、手机网站支付

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/49951_0v6y_2124.png)

## 设置接口加签方式（密钥/证书)

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50073_i1su_2213.png)

## 加签模式选择公钥，点击使用支付宝密钥生成器

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50092_rgf6_5109.png)
![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50142_0szk_2677.png)

## 生成公钥、私钥

- **这里的私钥需要配置在系统后台：应用私钥RSA2(SHA256)**
- **这里的公钥需要复制，在下一步配置用到**

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50192_dlqz_7435.png)

- 复制上个步骤生成的公钥复制在此页面保存设置

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50314_i3vf_6311.png)

## 账户中心绑定APPID

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50398_lmsh_8075.png)
![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50420_gwyz_7878.png)
![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50435_3crw_3560.png)

## 绑定成功后提交审核

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50466_a61w_3019.png)

## 审核通过后显示已上线

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50548_mlby_1877.png)

## 后台配置支付宝支付信息

- **这里支付宝公钥需要配置在系统后台的支付宝公钥**

![image.png](https://mz-assets.tecmz.com/data/image/2022/02/18/50646_9ux3_3926.png)

