# Lista de tarefa

Projeto desenvolvi para criar uma lista de tarefa. Bem simples e funcional.

Link de acesso ao projeto:
https://teste.hassetech.com/

![image](https://github.com/hasse910/lista_tarefas/assets/49128953/66171b49-52e2-4a83-bd53-586084ff99c0)


## Banco de dados
```
CREATE TABLE TASKS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    TITULO VARCHAR(255) NOT NULL,
    DESCRICAO TEXT,
    STATUS binary DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    DATE DATE,
    DELETED BINARY DEFAULT 0 NULL
);
```
