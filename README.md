# 小米/红米路由器 SSH 密码计算器

一个简单易用的在线工具，用于计算小米/红米路由器的 SSH 密码。

## 功能特点

- 🚀 纯前端实现，无需后端服务器
- 🔐 支持所有小米/红米路由器型号
- 📱 响应式设计，支持移动端访问
- 🎯 一键复制密码到剪贴板
- 💾 无数据收集，隐私安全

## 在线使用

直接打开 `index.html` 文件或部署到静态网站托管服务即可使用。

### 使用步骤

1. 访问路由器管理页面 [192.168.31.1](http://192.168.31.1)
2. 登录后，在主界面右下角找到 SN 号
3. 复制 SN 号粘贴到输入框
4. 点击"计算密码"按钮获取 SSH 密码

## 本地运行

### Web 界面方式

直接在浏览器中打开 `index.html` 文件：

```bash
# macOS
open index.html

# Linux
xdg-open index.html

# Windows
start index.html
```

### PHP 命令行方式

```bash
php ssh_get_password.php <SN号>
```

示例：
```bash
php ssh_get_password.php 12345/12345678
```

## 技术实现

### 密码计算算法

SSH 密码计算基于以下算法：

1. **判断路由器型号**
   - SN 中不包含 `/` → R1D 型号
   - SN 中包含 `/` → 其他型号

2. **选择盐值**
   - R1D 型号使用固定盐值
   - 其他型号使用反转后的盐值

3. **计算密码**
   ```
   password = MD5(SN + salt)[0:8]
   ```

### 技术栈

- **前端**: HTML5, CSS3, JavaScript
- **依赖**: [blueimp-md5](https://github.com/blueimp/JavaScript-MD5) (CDN)
- **替代方案**: PHP CLI 脚本

## 部署

### GitHub Pages

1. Fork 本仓库
2. 在仓库设置中启用 GitHub Pages
3. 选择分支作为源

### 其他静态托管

本项目可直接部署到任何静态网站托管服务：
- Netlify
- Vercel
- Cloudflare Pages
- 等

## 文件说明

```
xiaomi-ssh/
├── index.html              # 主页面文件
├── ssh_get_password.php    # PHP CLI 工具
├── logo.png                # 项目 Logo
├── thumbnail.webp          # 社交分享缩略图
├── AGENTS.md               # AI Agent 项目说明
└── README.md               # 项目文档
```

## 常见问题

**Q: 为什么需要 SSH 密码？**
A: SSH 密码用于登录路由器的 SSH 服务，可以进行高级配置、刷机（如 OpenWrt）等操作。

**Q: 支持哪些路由器型号？**
A: 支持所有小米/红米路由器型号，包括 R1D 和其他型号。

**Q: 数据安全吗？**
A: 所有计算在浏览器本地完成，不会上传任何数据到服务器。

**Q: 密码计算错误怎么办？**
A: 请确认 SN 号输入正确，注意区分大小写和特殊字符。

## 许可证

MIT License

## 贡献

欢迎提交 Issue 和 Pull Request！

## 致谢

- 密码算法来源于路由器固件解包分析
- 感谢所有贡献者的支持