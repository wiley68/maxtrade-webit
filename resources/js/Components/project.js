//default node
class TreeNode {
  constructor(key, value = key, parent = null) {
    this.key = key
    this.value = value
    this.parent = parent
    this.children = []
  }

  get isLeaf() {
    return this.children.length === 0
  }

  get hasChildren() {
    return !this.isLeaf
  }
}

//project node
class ProjectNode extends TreeNode {
  constructor(key, name, description) {
    super(key)
    this.name = name
    this.description = description
  }
}

//html node
class HtmlNode extends TreeNode {
  constructor(key, lang) {
    super(key)
    this.lang = lang
  }
}

//head node
class HeadNode extends TreeNode {
  constructor(key) {
    super(key)
  }
}

//title node
class TitleNode extends TreeNode {
  constructor(key, title) {
    super(key)
    this.title = title
  }
}

class Tree {
  constructor(key, name = '', description = '') {
    this.root = new ProjectNode(key, name, description)
  }

  *preOrderTraversal(node = this.root) {
    yield node
    if (node.children.length) {
      for (let child of node.children) {
        yield* this.preOrderTraversal(child)
      }
    }
  }

  *postOrderTraversal(node = this.root) {
    if (node.children.length) {
      for (let child of node.children) {
        yield* this.postOrderTraversal(child)
      }
    }
    yield node
  }

  insertHtmlNode(parentNodeKey, key, lang = 'en') {
    for (let node of this.preOrderTraversal()) {
      if (node.key === parentNodeKey) {
        node.children.push(new HtmlNode(key, lang))
        return true
      }
    }
    return false
  }

  insertHeadNode(parentNodeKey, key) {
    for (let node of this.preOrderTraversal()) {
      if (node.key === parentNodeKey) {
        node.children.push(new HeadNode(key))
        return true
      }
    }
    return false
  }

  insertTitleNode(parentNodeKey, key, title) {
    for (let node of this.preOrderTraversal()) {
      if (node.key === parentNodeKey) {
        node.children.push(new TitleNode(key, title))
        return true
      }
    }
    return false
  }

  remove(key) {
    for (let node of this.preOrderTraversal()) {
      const filtered = node.children.filter((c) => c.key !== key)
      if (filtered.length !== node.children.length) {
        node.children = filtered
        return true
      }
    }
    return false
  }

  find(key) {
    for (let node of this.preOrderTraversal()) {
      if (node.key === key) return node
    }
    return undefined
  }
}

export { Tree }
